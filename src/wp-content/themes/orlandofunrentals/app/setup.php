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

    $read = fn ($endpoint) => file_get_contents(filePath($endpoint));

    $entrypoints = json_decode($read('entrypoints.json'));

    /**
     * Iterates over the $entrypoints array and performs an action for each entry.
     *
     * @param array $entrypoints An array containing the entrypoints.
     * @param mixed $entry The current entry being processed.
     * @param mixed $value The value associated with the current entry.
     * @return void
     */
    foreach ($entrypoints as $entry => $value) {
        //check if object has css property
        if (!property_exists($value, 'css')) {
            continue;
        }

        wp_enqueue_style(
            "orlandofunrentals-{$entry}",
            fileUrl($value->css[0]),
            $value->dependencies,
            null,
            'all'
        );
    }
    //check if object has js property
    if (!property_exists($entrypoints->app, 'js')) {
        return;
    }

    /**
     * Enqueues a script.
     *
     * @param string $handle   Script handle.
     * @param string $src      Script source URL.
     * @param array  $deps     (Optional) An array of script handles on which this script depends.
     * @param string $ver      (Optional) Script version number.
     * @param bool   $in_footer (Optional) Whether to enqueue the script in the footer.
     */
    wp_enqueue_script(
        'orlandofunrentals-js',
        fileUrl($entrypoints->app->js[0]),
        $entrypoints->app->dependencies,
        null,
        true
    );
});

add_action('wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">';
});

add_filter('acf/settings/save_json', function ($path) {
    return filePath('acf-json', 'app');
});

add_filter('acf/settings/show_admin', function () {
    return current_user_can('manage_options');
});
