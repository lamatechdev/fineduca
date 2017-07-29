<?php
/**
* Plugin Name: Embed Link ShortCode
* Plugin URI: https://wordpress.org
* Description: This plugin adds a shortcode to get a similar functionality that has facebook when a link is pasted to the status input.
* Version: 3.0
* Author: Fermin Molina <fmolina@gmail.com>
* Author URI: http://wordpress.org
* License: GPL2
* Text Domain: embed-link-shortcode
*/

// Process the shortcode
function shortcode_embedlink($atts, $urlparam){

	global $post;
        $post_id = $post->ID;
        $urlparam = trim($urlparam);

	if ( empty($urlparam) )
		return __('ERROR: please, set an URL.', 'embed-link-shortcode');

	$content = @file_get_contents($urlparam);

	if( empty($content) )
		return __('ERROR: downloading URL:', 'embed-link-shortcode') . ' ' . $urlparam;

	$encoding = mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true);
	if( !empty($encoding) && $encoding != 'UTF-8' )
		$content = mb_convert_encoding($content, 'UTF-8', $encoding);

	$metatags = getMetaTags($content);

	if ( empty($metatags) )
		return __('ERROR: getting content from:', 'embed-link-shortcode') . ' ' .$content;

	// Get title
	$title = '';
	if( ! empty($metatags['og:title']) ) {
		$title = $metatags['og:title'];
	} elseif( ! empty($metatags['twitter:title']) ) {
		$title = $metatags['twitter:title'];
	} elseif( ! empty($metatags['title']) ) {
		$title = $metatags['title'];
	}
	$title = clean_string($title);

	// Get Image URL
	if( ! empty($metatags['og:image']) ){
		$image_url = $metatags['og:image'];
	} elseif( ! empty($metatags['og:image:secure_url']) ) {
		$image_url = $metatags['og:image:secure_url'];
	} elseif( ! empty($metatags['twitter:image']) ) {
		$image_url = $metatags['twitter:image'];
	} elseif( ! empty($metatags['twitter:image0']) ) {
		$image_url = $metatags['twitter:image0'];
	} elseif( ! empty($metatags['twitter:image:src']) ) {
		$image_url = $metatags['twitter:image:src'];
	} elseif( ! empty($metatags['twitter:image0:src']) ) {
		$image_url = $metatags['twitter:image0:src'];
	} else {
		$image_url = '';
	}

	// Get URL
	if( ! empty($metatags['og:url']) ){
		$url = $metatags['og:url'];
	} elseif( ! empty($metatags['canonical']) ) {
		$url = $metatags['canonical'];
	} else {
		$url = $urlparam;
	}

	// Upload image
	$r_image = '';
	if ( ! empty( $image_url) && ! has_post_thumbnail($post_id) ) {
		if ( !function_exists( 'media_sideload_image' ) ) {
			require_once ABSPATH . 'wp-admin/includes/media.php';
		}
		if ( !function_exists( 'download_url' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}
		if ( !function_exists( 'wp_read_image_metadata' ) ) {
			require_once ABSPATH . 'wp-admin/includes/image.php';
		}

		if( ! empty($title) ) {
			$image_name = $title;
		} else {
			$image_name = sha1($image_url);
		}

		$result = media_sideload_image($image_url, $post_id, $image_name, 'src');
		if(!is_wp_error($result)) {
			$r_image = '<img class="alignnone size-full" src="' . $result . '" alt="' . $title . '"  />';
			$attachments = get_posts(array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'DESC'));
			if(sizeof($attachments) > 0) {
				// Set image as the post thumbnail
				set_post_thumbnail($post_id, $attachments[0]->ID);
			}
		}
	}


        // ------ //
	// Render //
        // ------ //

	$render = '';

	// Image
	if( ! empty($r_image) )
		$render = $r_image;

	// Quote
	$r_desc = '';
	if( ! empty($metatags['og:description']) ){
		$r_desc = $metatags['og:description'];
	} elseif( ! empty($metatags['description']) ) {
		$r_desc = $metatags['description'];
	} elseif( ! empty($metatags['dc_description']) ) {
		$r_desc = $metatags['dc_description'];
	} elseif( ! empty($metatags['twitter:description']) ) {
		$r_desc = $metatags['twitter:description'];
	}
	if( ! empty($r_desc) )
		$render .= '<blockquote>' . clean_string($r_desc) . '</blockquote>';

	// Render title
	if( ! empty($title) ) {
		$r_title = $title;
		$r_url   = $url;
	} else {
		$r_title = $url;
		$r_url   = $url;
	}
	$render .= '<p>' . __('Source:', 'embed-link-shortcode') . ' <em><a href="' . $r_url . '">' . $r_title . '</a></em></p>';

	// Add tags
	$tags = '';
	if( ! empty($metatags['keywords']) ) {
		$tags = $metatags['keywords'];
	} elseif( ! empty($metatags['news_keywords']) ) {
		$tags = $metatags['news_keywords'];
	}

	// Modify post
	$post = array();
	$post['ID'] = $post_id;

	if( ! empty($title) )
		$post['post_title'] = $title;

	// Leave 'post_name' empty to force Wordpress generate new slug.
	$post['post_name'   ] = '';
	$post['post_content'] = $render;
	$post['post_type'   ] = 'post';
	if( ! empty($tags) )
		$post['tags_input'] = $tags;

	// Avoid infinite loops
	remove_shortcode('embedlink');

	set_post_format($post_id, 'link');
	wp_update_post($post, true);

	add_shortcode('embedlink', 'shortcode_embedlink');

	// Test errors
	if( is_wp_error($post_id) ) {
		$str_error = __('ERROR: inserting new HTML rendered code to the entry body or setting post format:', 'embed-link-shortcode') . '<br>';
		$errors = $post_id->get_error_messages();
		foreach ($errors as $error) {
			$str_error .= ($error . '<br>');
		}
		return $str_error;
	}

	return '';
}
add_shortcode('embedlink', 'shortcode_embedlink');


// Utils: extract meta tags from html
function getMetaTags($str) {
	$pattern = '
	  ~<\s*meta\s

	  # using lookahead to capture type to $1
	    (?=[^>]*?
	    \b(?:name|property|http-equiv)\s*=\s*
	    (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
	    ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
	  )

	  # capture content to $2
	  [^>]*?\bcontent\s*=\s*
	    (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
	    ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
	  [^>]*>

	  ~ix';
 
	if(preg_match_all($pattern, $str, $out))
		return array_combine($out[1], $out[2]);
	return array();
}

// Clean string (tags, etc)
function clean_string($str) {
	return preg_replace("/&#?[a-z0-9]+;/i","", wp_strip_all_tags(html_entity_decode(htmlspecialchars_decode($str))));
}

// Language management
function embed_link_shortcode_language_init() {
	load_plugin_textdomain( 'embed-link-shortcode', FALSE, plugin_basename(dirname( __FILE__ )) ); 
}
add_action( 'plugins_loaded', 'embed_link_shortcode_language_init' );

