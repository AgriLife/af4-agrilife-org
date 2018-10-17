<?php
/**
 * Plugin Name: Agrilife.org - AgriFlex4
 * Plugin URI: https://github.com/AgriLife/af4-agrilife-org
 * Description: Core functionality for Agrilife.org on AgriFlex4
 * Version: 0.1.0
 * Author: Zachary Watkins
 * Author URI: https://github.com/ZachWatkins/
 * Author Email: zachary.watkins@ag.tamu.edu
 * License: GPL-2.0+
 */

require 'vendor/autoload.php';

// Define some useful constants
define( 'ALAF4_DIRNAME', 'af4-agrilife-org' );
define( 'ALAF4_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'ALAF4_DIR_FILE', __FILE__ );
define( 'ALAF4_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'ALAF4_TEXTDOMAIN', 'af4-agrilife-org' );
define( 'ALAF4_TEMPLATE_PATH', ALAF4_DIR_PATH . 'templates' );

// Autoload all classes
spl_autoload_register( 'Agrilife::autoload' );

class Agrilife {

	private static $file = __FILE__;

	private static $instance;

	private function __construct() {

		add_action( 'init', array( $this, 'init' ) );

		$this->register_templates();

	}

	/**
	 * Initialize the various classes
	 * @since 0.1.0
	 * @return void
	 */
	public function init() {

		// Set up asset files
		$ado_assets = new \Agrilife\Assets;

		// Get Genesis set up the way we want it
		$ado_genesis = new \Agrilife\Genesis;

		// Set up required DOM
		$ado_dom = new \Agrilife\RequiredDOM;

	}

	/**
	 * Initialize page templates
	 * @since 0.1.0
	 * @return void
	 */
	private function register_templates() {

		$home = new \Agrilife\PageTemplate( ALAF4_TEMPLATE_PATH, 'home.php', 'Home' );
		$home->register();

		$comm = new \Agrilife\PageTemplate( ALAF4_TEMPLATE_PATH, 'communications.php', 'Communications' );
		$comm->register();

	}

	/**
	 * Autoloads any classes called within the theme
	 * @since 0.1.0
	 * @param  string $classname The name of the class
	 * @return void
	 */
	public static function autoload( $classname ) {

		$filename = dirname( __FILE__ ) .
      DIRECTORY_SEPARATOR .
      str_replace( '_', DIRECTORY_SEPARATOR, $classname ) .
      '.php';
    if ( file_exists( $filename ) )
      require $filename;

	}

	public static function get_instance() {

		return null == self::$instance ? new self : self::$instance;

	}

}

Agrilife::get_instance();
