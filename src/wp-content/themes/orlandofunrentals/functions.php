<?php

/**
 * Theme functions and definitions.
 *
 * @package OrlandoFunRentals
 * @since 1.0.0
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('THEME_VERSION', '1.0.0');

require get_stylesheet_directory() . '/app/helpers.php';
require get_stylesheet_directory() . '/app/setup.php';
require get_stylesheet_directory() . '/app/actions.php';
require get_stylesheet_directory() . '/app/filters.php';
require get_stylesheet_directory() . '/app/shortcodes.php';
