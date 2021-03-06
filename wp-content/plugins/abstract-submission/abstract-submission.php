<?php
/*
Plugin Name: Submissão de Trabalhos
Description: Submissão de Trabalhos é um plugin responsável pela submissão de trabalhos acadêmicos
Version: 1.0
Author: André Lucas
*/

// Admin Panel
global $wpdb;
add_action('admin_menu', 'abstracts_add_pages');
add_action('wp_head', 'abstracts_css');
add_action('init', 'abstracts_download_file');
add_action('init', 'abstracts_download_pdf_file');
register_activation_hook(__FILE__,'abstracts_install');
add_filter('the_content', 'abstracts_submission_page');

require_once(plugin_dir_path(__FILE__).'/submission-menu.php');

function abstracts_add_pages() {
    add_menu_page('Submissões', 'Submissões', 8, __FILE__, 'abstracts_view_page');
}

function abstracts_view_page() {
	global $wpdb;
    include('abstracts-view.php');
}

function abstracts_options_page() {
	global $wpdb;
    include('abstracts-options.php');
}

function abstracts_css() {  
	echo '<link type="text/css" rel="stylesheet" href="'.get_bloginfo('wpurl').'/wp-content/plugins/abstract-submission/css/style.css" />' . "\n";
	echo '<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/abstract-submission/js/scripts.js" ></script>' . "\n"; 
	echo '<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/abstract-submission/js/jquery-1.8.3.min.js" ></script>' . "\n"; 
	echo '<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/abstract-submission/js/jquery.maskedinput.min.js" ></script>' . "\n"; 
	echo '<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/abstract-submission/js/scripts-1.js" ></script>' . "\n"; 
} 

function abstracts_submission_page($content) {
	global $wpdb;
	ob_start();
    include('abstracts-submit.php');
	$html = ob_get_clean();
	$tags = array('[abstract-submission-form]','[abstract-submission-chars-count]','[abstract-submission-max-attach-size]');
	$subst = array($html,get_option('abstracts_chars_count'),get_option('abstracts_maximum_attach_size'));
	if(!empty($_POST['abs_text']) && $_POST['abs_text']) {
		return $html;
	} else {
		return str_replace($tags,$subst,$content);
	}
}

function abstracts_download_file() {
	global $wpdb;
	if(!empty($_GET['abstracts_download_file']) && $_GET['abstracts_download_file']) {
		$file = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."abstracts_attachments where id=".$_GET['abstracts_download_file']);
		$content = rawurldecode($file->filecontent);

		header("Content-length: ".$file->filesize);
		header("Content-type: ".$file->filemeta);
		header("Content-Disposition: attachment; filename=".$file->filename);
		echo $content;
		exit(0);
	}
}

function abstracts_download_pdf_file() {
	global $wpdb;
	if(!empty($_GET['abstracts_download_pdf_file']) && $_GET['abstracts_download_pdf_file']) {
		$file = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."submitted_abstracts where id=".$_GET['abstracts_download_pdf_file']);
		$content = utf8_decode(stripslashes($file->html));

		require_once("dompdf-0.5.1/dompdf_config.inc.php");
		
		$dompdf = new DOMPDF();
		$dompdf->load_html($content);
		$dompdf->set_paper('a4', 'vertical');
		$dompdf->render();
		$dompdf->stream('abstract.pdf');
		exit(0);
	}
}


function abstracts_install() {
   global $wpdb;
   require_once(ABSPATH.'wp-admin/includes/upgrade.php');      

   $table_name = $wpdb->prefix."submitted_abstracts";
   $users = $wpdb->prefix."users";
   
  // $wpdb->query("drop table ".$table_name);
   
      $sql = "CREATE TABLE ".$table_name." (
		  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
		  author int,
		  co_author1 int,
		  co_author2 int,
		  title varchar(255),
		  abstract text,
		  thematic_axis varchar(100),
		  data date,
		  PRIMARY KEY  (id)
	  );";

      dbDelta($sql);

	$table_name = $wpdb->prefix."abstracts_attachments";

   //$wpdb->query("drop table ".$table_name);

      $sql = "CREATE TABLE ".$table_name." (
	  	id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
		abstracts_id int(11),
		fileurl varchar(255),
		filetype varchar(255),
		PRIMARY KEY  (id)
	  );";

      dbDelta($sql);


   $sql = "ALTER TABLE ".$table_name." ADD COLUMN avaliacao INT NULL DEFAULT 0 COMMENT '' AFTER data";
	dbDelta($sql);

	add_option("abstracts_chars_count", 12000);
	add_option("abstracts_maximum_attach_size", 2048000);
	add_option("abstracts_mail_template", "Dear [AUTHOR],<br/>You have correctly submitted your abstract:<br/><strong>[ABSTRACT_TITLE]</strong><br/><br/>Best Regards,<br/><em>[BLOGTITLE]</em>");
	
}

?>