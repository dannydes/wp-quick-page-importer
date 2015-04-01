<?php

/**
 * Plugin Name: Quick Page Importer
 * Description: Imports HTML pages into a subdirectory without integrating the page with the existing WP site.
 * Version: 0.1
 * Author: Daniel Desira
 */

require_once 'includes/options.php';

function wpqpi_init_callback() {
	
}

function wpqpi_init() {
	add_action( 'wpqpi_init', 'wpqpi_init_callback' );
	do_action( 'wpqpi_init' );
}

add_action( 'init', 'wpqpi_init' );

?>