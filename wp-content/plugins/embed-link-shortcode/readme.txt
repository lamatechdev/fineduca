=== Plugin Name ===
Contributors: nosuko
Donate link: http://www.wordpress.org
Tags: shortcode,embed,link
Version: 3.0
Stable tag: 3.0
Requires at least: 4.2
Tested up to: 4.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin adds a shortcode to get a similar functionality that has facebook when a link is pasted to the input status.


== Description ==

'Embed Link ShortCode' tries to emulate the functionality that facebook has when a link is pasted to the input status.
But it doesn't happen when you paste a link in the body of a new post (as when you paste a youtube link in the visual view of a post), it's done using a shortcode.
The provided link to the shortcode is fetched to get the meta tags, and these meta tags are used to render the new post content. It tries to get an image and put it as
post default thumbnail, and it uses some meta tags to get title text and to add a quote. The order in the post content is: image, quote and link.
If you don't like the HTML render, you can always edit the code to change format or suggest me some changes.

Usage:

1- Create a new post.

2- Add only the shortcode with the link (in HTML mode, not Visual) in the post body. For example:

   [embedlink]http://example.com/example[/embedlink]

3- Push 'Save Draft'.

   If all is ok, the post content will be rewritten with the rendered html code. An image may be uploaded to the media library and added as post default thumbnail.
   If nothing happens, click the preview link and some message may be displayed. Otherwise, it will be a bug: please, report it adding the URL you used and the plugin version (update to last version before report!).

4- Review the generated code.


== Installation ==

This section describes how to install the plugin and to get it working:

1. Upload and unzip `embed-link-shortcode.zip` to the `/wp-content/plugins/` directory or use the standard Wordpress GUI way through the 'Plugins' menu to install the .zip file.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Enjoy the new shortcode!


== Frequently Asked Questions ==

= Why the post content (with the shortcode) is rewritten? =

Because if that were not done in that way, everytime the post were loaded in the browser, the shortcode would be executed (recursion alike).


== Screenshots ==

1. No screenshots provided at the moment.


== Changelog ==

= 3.0 =
* Reverted internal changes introduced in versión 2.0. Now, it's more simple: only shortcode code is used, and the hook is removed when save the post and added just after to avoid annoying loops. I hope is the last internal big change.
* Updated readme.
* Tested in WP 4.7.

= 2.0 =
* Changed internals: now, the shortcode is applied after the post is saved, not before (changed from hook 'content_save_pre' to 'save_post'). Also, the hook is removed and added when the post is saved to avoid annoying loops.
* Detect ISO-8859-1 encoding and convert to UTF-8 to avoid some issues.

= 1.1 =
* From WP 4.5 version, by default, the original plugin behaviour was restored (I don't know... maybe some internal changes, but I can not find them). So I modified the readme to reflect both behaviours in case of future WP changes.

= 1.0 =
* After some testing months, and at same time WP 4.5, here is 1.0 version.

= 0.9 =
* Tested with Wordpress 4.5. 
* The changes introduced in version 0.8 do not work properly, so the behaviour had to be modified. 
* Updated usage section to reflect plugin latest changes.

= 0.8 =
* Tested and working in 4.4 version.
* Add support for 'news_keywords' tag from meta web info.
* From aprox Dec 1, 2015, shortcode doesn't get processed when "Save Draft" is pressed. Adding "content_save_pre" filter to get sure it gets processed.

= 0.7 =
* Clean title and description strings from tags, html entities, etc.

= 0.6 =
* Fix media title name generation for an image that must be inserted into library.

= 0.5 =
* Implemented translation. Added tranlation to spanish.
* Improved HTML render.
* Improved documentation.
* Some minor fixes.

= 0.4 =
* Minor fixes.
* Added better support to get a good title for the post.

= 0.3 =
* Fixes in dirs to get correctly packed by wordpress plugin publication system.

= 0.2 =
* Some minor fixes to readme.txt.

= 0.1 =
* Some minor fixes.
* Added error control after modify the post.

= 0.0.1 =
* Initial version. Works fine.
* Support to oEmbed will be added in a future version.


== Upgrade Notice ==

= 0.0.1 =
First release.


== Notes ==

1. The post format will be set to 'link' by default.
2. The image (if any is found) will be added to the media library and set to post default thumbnail.
3. The content post is rewritten when you save it.
