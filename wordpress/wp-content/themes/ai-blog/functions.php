<?php

/**
 * Ai Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ai Blog
 */

$ai_blog_theme = wp_get_theme();
$ai_blog_text_domain = $ai_blog_theme->get('TextDomain');

if (!defined('AI_BLOG_VERSION')) {
	$ai_blog_theme = wp_get_theme();
	define('AI_BLOG_VERSION', $ai_blog_theme->get('Version'));
}

if (!function_exists('ai_blog_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ai_blog_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ai Blog, use a find and replace
		 * to change 'ai-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('ai-blog', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__('Main Menu', 'ai-blog'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ai_blog_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');
		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');
		add_theme_support("responsive-embeds");

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		add_editor_style(array(ai_blog_fonts_url()));
	}
endif;
add_action('after_setup_theme', 'ai_blog_setup');



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ai_blog_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ai_blog_content_width', 1170);
}
add_action('after_setup_theme', 'ai_blog_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ai_blog_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'ai-blog'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'ai-blog'),
			'before_widget' => '<section id="%1$s" class="widget shadow mb-5 p-3 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'ai_blog_widgets_init');

/**
 * Register custom fonts.
 */
function ai_blog_fonts_url()
{
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'Rubik:400,400i,700,700i,900,900i';
	$font_families[] = 'Inter:400,400i,500,600,700,700i,900';

	$query_args = array(
		'family' => urlencode(implode('|', $font_families)),
		'subset' => urlencode('latin,latin-ext'),
	);

	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');


	return esc_url_raw($fonts_url);
}


/**
 * Enqueue scripts and styles.
 */
function ai_blog_scripts()
{
	wp_enqueue_style('ai-blog-google-font', ai_blog_fonts_url(), array(), null);
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '5.0.1', 'all');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.css', array(), '5.15.3');
	wp_enqueue_style('ai-blog-block-style', get_template_directory_uri() . '/assets/css/block.css', array(), AI_BLOG_VERSION);
	wp_enqueue_style('ai-blog-default-style', get_template_directory_uri() . '/assets/css/default-style.css', array(), AI_BLOG_VERSION);
	wp_enqueue_style('ai-blog-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), AI_BLOG_VERSION);
	wp_enqueue_style('ai-blog-style', get_stylesheet_uri(), array(), AI_BLOG_VERSION);
	wp_enqueue_style('ai-blog-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), AI_BLOG_VERSION);

	wp_enqueue_script('masonry');
	wp_enqueue_script('ai-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), AI_BLOG_VERSION, true);
	wp_enqueue_script('particles', get_template_directory_uri() . '/assets/js/particles.js', array(), AI_BLOG_VERSION, true);
	wp_enqueue_script('particles-config', get_template_directory_uri() . '/assets/js/particles-config.js', array(), AI_BLOG_VERSION, true);
	wp_enqueue_script('ai-blog-mmenu-scripts', get_template_directory_uri() . '/assets/js/mobile-menu.js', array('jquery'), '1.0.10', true);
	wp_enqueue_script('ai-blog-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), AI_BLOG_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ai_blog_scripts');

function ai_blog_gb_block_style()
{

	wp_enqueue_style('ai-blog-gb-block', get_theme_file_uri('/assets/css/admin-block.css'), false, '1.0', 'all');
	wp_enqueue_style('ai-blog-admin-google-font', ai_blog_fonts_url(), array(), null);
}
add_action('enqueue_block_assets', 'ai_blog_gb_block_style');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Add tem plugin activation
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/recomended-plugin.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/info/class-customize.php';


if (is_admin()) {
	require_once trailingslashit(get_template_directory()) . 'inc/about/about.php';
}
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load all actions file
require get_template_directory() . '/actions/header-actions.php';
require get_template_directory() . '/actions/home-intro.php';


function ai_blog_exerpt_empty_string($more)
{
	if (is_admin()) {
		return $more;
	}
	return '';
}
add_filter('excerpt_more', 'ai_blog_exerpt_empty_string', 999);
