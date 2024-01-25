<?php

/**
 * Ai Blog Lite Theme Customizer
 *
 * @package Ai Blog Lite Plus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function ai_blog_lite_customize_register($wp_customize)
{

    $wp_customize->remove_control('ai_blog_blog_container');
    $wp_customize->remove_control('ai_blog_blog_style');

    //select sanitization function
    function sanitize_select($input, $setting)
    {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }

    $wp_customize->add_setting('ai_blog_lite_blog_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'ai_blog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_lite_blog_container', array(
        'label'      => __('Container type', 'ai-blog-lite'),
        'description' => __('You can set standard container or full width container. ', 'ai-blog-lite'),
        'section'    => 'ai_blog_blog',
        'settings'   => 'ai_blog_lite_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'ai-blog-lite'),
            'container-fluid' => __('Full width Container', 'ai-blog-lite'),
        ),
    ));

    $wp_customize->add_setting('ai_blog_lite_blog_style', array(
        'default'        => 'list',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'ai_blog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ai_blog_lite_blog_style', array(
        'label'      => __('Select Blog Style', 'ai-blog-lite'),
        'section'    => 'ai_blog_blog',
        'settings'   => 'ai_blog_lite_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'list' => __('List Style', 'ai-blog-lite'),
            'grid' => __('Grid Style', 'ai-blog-lite'),
            'classic' => __('Classic Style', 'ai-blog-lite'),
        ),
    ));
}
add_action('customize_register', 'ai_blog_lite_customize_register', 99);
