<?php

/**
 * This file contains common and useful functions to avoid code duplication (DRY).
 * 
 * @package OrlandoFunRentals
 * @subpackage Helpers
 * @since 1.0.0
 */


/**
 * Generates the URL for a distributed file.
 *
 * @param string $endpoint The endpoint of the file.
 * @param string $folder The folder where the file is located (default: 'dist').
 * @return string The URL of the distributed file.
 */
function fileUrl ($endpoint, $folder = 'dist') {
    return join("/", [get_stylesheet_directory_uri(), $folder, $endpoint]);
}

/**
 * Returns the file path for a given endpoint and folder.
 *
 * @param string $endpoint The endpoint for the file.
 * @param string $folder   The folder where the file is located (default: 'dist').
 * @return string The file path.
 */
function filePath ($endpoint, $folder = 'dist') {
    return join("/", [get_stylesheet_directory(), $folder, $endpoint]);
}