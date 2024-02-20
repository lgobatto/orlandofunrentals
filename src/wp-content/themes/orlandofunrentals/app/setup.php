<?php

/**
 * Theme Setup
 *
 * This file is responsible for theme setup under WordPress, ensuring all requirements are met
 * like post types creation and other necessary hooks for implementation.
 *
 * @package OrlandoFunRentals
 * @subpackage Setup
 * @since 1.0.0
 */

/**
 * Adds an action to enqueue scripts and stylesheets on the front-end.
 *
 * This function is hooked to the 'wp_enqueue_scripts' action, which is fired
 * when scripts and stylesheets are enqueued on the front-end of the website.
 * It is used to add custom scripts and stylesheets to the website.
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('theme', get_template_directory_uri() . '/dist/css/app.css', [], THEME_VERSION);
    wp_enqueue_script('theme', get_template_directory_uri() . '/dist/js/app.js', ['jquery'], THEME_VERSION, true);
});
