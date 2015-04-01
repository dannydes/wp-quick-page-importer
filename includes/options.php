<?php

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
	
	public function create_admin_page() {
		$this->options = get_option( 'wpqpi_setting' ); ?>
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2>Quick Page Importer</h2>
		</div><?php
		submit_button();
	}
	
	public function file_picker_callback() { ?>
		<label for="file">Upload file: </label>
		<input type="file" id="file" name="file">
		<?php
	}
	
	public function page_init() {
		
	}
	
}

if ( is_admin() ) {
	$settings_page = new WPQPI_Settings_Page();
}