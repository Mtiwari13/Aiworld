<?php

/**
 * Ai Blog Theme Customizer
 *
 * @package Ai Blog
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ai_blog_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    //select sanitization function
    function ai_blog_sanitize_select($input, $setting)
    {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
    function ai_blog_sanitize_image($file, $setting)
    {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        //check file type from file name
        $file_ext = wp_check_filetype($file, $mimes);
        //if file has a valid mime type return it, otherwise return default
        return ($file_ext['ext'] ? $file : $setting->default);
    }

    $wp_customize->add_setting('ai_blog_site_tagline_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_site_tagline_show', array(
        'label'      => __('Hide Site Tagline Only? ', 'ai-blog'),
        'section'    => 'title_tagline',
        'settings'   => 'ai_blog_site_tagline_show',
        'type'       => 'checkbox',

    ));

    $wp_customize->add_panel('ai_blog_settings', array(
        'priority'       => 50,
        'title'          => __('Ai Blog Theme settings', 'ai-blog'),
        'description'    => __('All Ai Blog theme settings', 'ai-blog'),
    ));
    $wp_customize->add_section('ai_blog_header', array(
        'title' => __('Ai Blog Header Settings', 'ai-blog'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Ai Blog theme header settings', 'ai-blog'),
        'panel'    => 'ai_blog_settings',

    ));
    $wp_customize->add_setting('ai_blog_main_menu_style', array(
        'default'        => 'style1',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'ai_blog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_main_menu_style', array(
        'label'      => __('Header Style', 'ai-blog'),
        'description' => __('You can set the header style one or two. ', 'ai-blog'),
        'section'    => 'ai_blog_header',
        'settings'   => 'ai_blog_main_menu_style',
        'type'       => 'select',
        'choices'    => array(
            'style1' => __('Style One', 'ai-blog'),
            'style2' => __('Style Two', 'ai-blog'),
        ),
    ));

    //Ai Blog Home intro
    $wp_customize->add_section('ai_blog_hbanner', array(
        'title' => __('Home Intro Settings', 'ai-blog'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Portfoli profile Intro Settings', 'ai-blog'),
        'panel'    => 'ai_blog_settings',

    ));
    $wp_customize->add_setting('ai_blog_hbanner_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_hbanner_show', array(
        'label'      => __('Show Home Banner? ', 'ai-blog'),
        'description'     => __('Show only home page.', 'ai-blog'),
        'section'    => 'ai_blog_hbanner',
        'settings'   => 'ai_blog_hbanner_show',
        'type'       => 'checkbox',

    ));
    $wp_customize->add_setting('ai_blog_hbanner_img', array(
        'capability'        => 'edit_theme_options',
        'default'           => get_template_directory_uri() . '/assets/img/banner.jpg',
        'sanitize_callback' => 'ai_blog_sanitize_image',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'ai_blog_hbanner_img',
        array(
            'label'    => __('Upload Banner Image', 'ai-blog'),
            'description'    => __('Image size should be 450px width & 460px height for better view.', 'ai-blog'),
            'section'  => 'ai_blog_hbanner',
            'settings' => 'ai_blog_hbanner_img',
        )
    ));
    $wp_customize->add_setting('ai_blog_hbanner_subtitle', array(
        'default' => __('Challenges in the World of AI', 'ai-blog'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_hbanner_subtitle', array(
        'label'      => __('Intro Subtitle', 'ai-blog'),
        'section'    => 'ai_blog_hbanner',
        'settings'   => 'ai_blog_hbanner_subtitle',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('ai_blog_hbanner_title', array(
        'default' => __('The AI Revolution', 'ai-blog'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_hbanner_title', array(
        'label'      => __('Intro Title', 'ai-blog'),
        'section'    => 'ai_blog_hbanner',
        'settings'   => 'ai_blog_hbanner_title',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('ai_blog_color_title', array(
        'default' => __('Leading AI Experts ', 'ai-blog'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_color_title', array(
        'label'      => __('Intro Color Title', 'ai-blog'),
        'section'    => 'ai_blog_hbanner',
        'settings'   => 'ai_blog_color_title',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('ai_blog_hbanner_desc', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_hbanner_desc', array(
        'label'      => __('Intro Description', 'ai-blog'),
        'section'    => 'ai_blog_hbanner',
        'settings'   => 'ai_blog_hbanner_desc',
        'type'       => 'textarea',
    ));
    $wp_customize->add_setting('ai_blog_btn_text_one', array(
        'default' => __('Read More', 'ai-blog'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('ai_blog_btn_text_one', array(
        'label'      => __('Button one text', 'ai-blog'),
        'section'    => 'ai_blog_hbanner',
        'settings'   => 'ai_blog_btn_text_one',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('ai_blog_btn_url_one', array(
        'default' => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_btn_url_one', array(
        'label'      => __('Button one url', 'ai-blog'),
        'description'      => __('Keep url empty for hide this button', 'ai-blog'),
        'section'    => 'ai_blog_hbanner',
        'settings'   => 'ai_blog_btn_url_one',
        'type'       => 'url',
    ));


    //Ai Blog blog settings
    $wp_customize->add_section('ai_blog_blog', array(
        'title' => __('Ai Blog Blog Settings', 'ai-blog'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Ai Blog theme blog settings', 'ai-blog'),
        'panel'    => 'ai_blog_settings',

    ));
    $wp_customize->add_setting('ai_blog_blog_container', array(
        'default'        => 'container-fluid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'ai_blog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_blog_container', array(
        'label'      => __('Container type', 'ai-blog'),
        'description' => __('You can set standard container or full width container. ', 'ai-blog'),
        'section'    => 'ai_blog_blog',
        'settings'   => 'ai_blog_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'ai-blog'),
            'container-fluid' => __('Full width Container', 'ai-blog'),
        ),
    ));
    $wp_customize->add_setting('ai_blog_blog_layout', array(
        'default'        => 'fullwidth',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'ai_blog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_blog_layout', array(
        'label'      => __('Select Blog Layout', 'ai-blog'),
        'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'ai-blog'),
        'section'    => 'ai_blog_blog',
        'settings'   => 'ai_blog_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'ai-blog'),
            'leftside' => __('Left Sidebar', 'ai-blog'),
            'fullwidth' => __('No Sidebar', 'ai-blog'),
        ),
    ));
    $wp_customize->add_setting('ai_blog_blog_style', array(
        'default'        => 'grid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'ai_blog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_blog_style', array(
        'label'      => __('Select Blog Style', 'ai-blog'),
        'section'    => 'ai_blog_blog',
        'settings'   => 'ai_blog_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'grid' => __('Grid Style', 'ai-blog'),
            'classic' => __('Classic Style', 'ai-blog'),
        ),
    ));
    //Ai Blog page settings
    $wp_customize->add_section('ai_blog_page', array(
        'title' => __('Ai Blog Page Settings', 'ai-blog'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Ai Blog theme blog settings', 'ai-blog'),
        'panel'    => 'ai_blog_settings',

    ));
    $wp_customize->add_setting('ai_blog_page_container', array(
        'default'        => 'container-fluid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'ai_blog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_page_container', array(
        'label'      => __('Page Container type', 'ai-blog'),
        'description' => __('You can set standard container or full width container for page. ', 'ai-blog'),
        'section'    => 'ai_blog_page',
        'settings'   => 'ai_blog_page_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'ai-blog'),
            'container-fluid' => __('Full width Container', 'ai-blog'),
        ),
    ));
    $wp_customize->add_setting('ai_blog_page_header', array(
        'default'        => 'show',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'ai_blog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_page_header', array(
        'label'      => __('Show Page header', 'ai-blog'),
        'section'    => 'ai_blog_page',
        'settings'   => 'ai_blog_page_header',
        'type'       => 'select',
        'choices'    => array(
            'show' => __('Show all pages', 'ai-blog'),
            'hide-home' => __('Hide Only Front Page', 'ai-blog'),
            'hide' => __('Hide All Pages', 'ai-blog'),
        ),
    ));




    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'ai_blog_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'ai_blog_customize_partial_blogdescription',
            )
        );
    }
}
add_action('customize_register', 'ai_blog_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ai_blog_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ai_blog_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ai_blog_customize_preview_js()
{
    wp_enqueue_script('ai-blog-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), AI_BLOG_VERSION, true);
}
add_action('customize_preview_init', 'ai_blog_customize_preview_js');
