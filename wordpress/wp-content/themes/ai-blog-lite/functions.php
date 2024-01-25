<?php
/*This file is part of Magic Elementor child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/
$ai_blog_lite_theme = wp_get_theme();
if (!defined('AI_BLOG_LITE_VERSION')) {
	// Replace the version number of the theme on each release.
	define('AI_BLOG_LITE_VERSION', $ai_blog_lite_theme->get('Version'));
}

function ai_blog_lite_fonts_url()
{
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'Poppins:400,600';
	$font_families[] = 'Roboto:400,600,700';

	$query_args = array(
		'family' => urlencode(implode('|', $font_families)),
		'subset' => urlencode('latin,latin-ext'),
	);

	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');

	return esc_url_raw($fonts_url);
}


function ai_blog_lite_enqueue_child_styles()
{
	wp_enqueue_style('ai-blog-lite-google-font', ai_blog_lite_fonts_url(), array(), null);
	wp_enqueue_style('ai-blog-lite-parent-style', get_template_directory_uri() . '/style.css', array('ai-blog-lite-style'), AI_BLOG_LITE_VERSION, 'all');
	wp_enqueue_style('ai-blog-lite-main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('bootstrap', 'ai-blog-style', 'ai-blog-main-style', 'ai-blog-default-style'), AI_BLOG_LITE_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'ai_blog_lite_enqueue_child_styles');





add_filter('excerpt_more', 'ai_blog_lite_exerpt_empty_string', 999);
function ai_blog_lite_exerpt_empty_string($more)
{
	if (is_admin()) {
		return $more;
	}
	return '';
}
/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';
