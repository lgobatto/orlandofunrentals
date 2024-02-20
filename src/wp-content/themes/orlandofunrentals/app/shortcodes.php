<?php

/**
 * This file is responsible for creating WordPress shortcodes.
 *
 * @package OrlandoFunRentals
 * @subpackage Shortcodes
 * @since 1.0.0
 */

/**
 * Adds a shortcode for the 'ofr_header' functionality.
 *
 * @param array $atts The attributes passed to the shortcode.
 * @return string The generated output for the shortcode.
 */
add_shortcode('ofr_header', function ($atts) {
    $atts = shortcode_atts([], $atts);
    ob_start();
    require_once filePath('header.php', 'views');
    return ob_get_clean();
});

/**
 * Adds a shortcode for the 'ofr_footer' functionality.
 *
 * @param array $atts The attributes passed to the shortcode.
 * @return string The generated output for the shortcode.
 */
add_shortcode('ofr_footer', function ($atts) {
    $atts = shortcode_atts([], $atts);
    ob_start();
    require_once filePath('footer.php', 'views');
    return ob_get_clean();
});
