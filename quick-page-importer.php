<?php

/**
 * Plugin Name: Quick Page Importer
 * Description: Imports HTML pages into a subdirectory without integrating the page with the existing WP site.
 * Version: 0.1
 * Author: Daniel Desira
 * License: GNU GPL
 */

class WPQPI_Settings_Page {
	
	private $options;
	
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
	}
	
	public function add_plugin_page() {
		add_options_page(
					'Settings Admin',
					'Quick Page Importer',
					'manage_options',
					'wpqpi-setting-admin',
					array( $this, 'create_admin_page' )
				);
	}
	
	public function create_admin_page() { ?>
		<style>
			#file {
				display: none;
			}
		</style>
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2>Quick Page Importer</h2>
			<form method="post" action="<?php echo plugin_dir_url( __FILE__ ); ?>wpqpi-process.php" enctype="multipart/form-data" target="__blank">
				<a id="file_link" class="browser button button-hero" href="#">Upload file</a>
				<input id="file" type="file" name="file"><?php
				submit_button();
			?></form>
		</div>
		<script>
			(function ( $ ) {
				$( '#file_link' ).click(function () {
					$( '#file' ).click();
				});
			})( jQuery );
		</script><?php
	}
	
	public function page_init() { }
	
}

if ( is_admin() ) {
	$settings_page = new WPQPI_Settings_Page();
}