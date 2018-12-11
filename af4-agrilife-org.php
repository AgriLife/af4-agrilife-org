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

// Code for plugins
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'af4_agrilife_activation' );
function af4_agrilife_activation() {
	if ( ! get_option( 'af4_agrilife_flush_rewrite_rules_flag' ) ) {
		add_option( 'af4_agrilife_flush_rewrite_rules_flag', true );
	}
}

// Autoload all classes
spl_autoload_register( 'Agrilife::autoload' );

class Agrilife {

	private static $file = __FILE__;

	private static $instance;

	private function __construct() {

		add_action( 'init', array( $this, 'init' ) );

		$this->register_templates();

		// Add ACF WYSIWYG toolbar
		add_filter( 'acf/fields/wysiwyg/toolbars' , array( $this, 'toolbars' ) );

		add_image_size( 'exceptional_item_director_small', 334, 250, array( 'center', 'top' ) );
		add_image_size( 'exceptional_item_director_medium', 480, 360, array( 'center', 'top' ) );
		add_image_size( 'exceptional_item_director_large', 640, 480, array( 'center', 'top' ) );
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

		// Add custom post type for Exceptional Items
	  if ( class_exists( 'acf' ) ) {
	    require_once(ALAF4_DIR_PATH . 'fields/exceptional-item-fields.php');
	  }

		$post_type = new \Agrilife\PostType(
			'Exceptional Item', ALAF4_TEMPLATE_PATH, 'exceptional-item', 'af4', array(), 'dashicons-portfolio',
			array(
				'title', 'editor', 'genesis-seo', 'genesis-scripts'
			),
			array(
				'single' => 'single-exceptional-item.php'
			)
		);

		if ( get_option( 'af4_agrilife_flush_rewrite_rules_flag' ) ) {
			flush_rewrite_rules();
			delete_option( 'af4_agrilife_flush_rewrite_rules_flag' );
		}

	}

	/**
	 * Add ACF toolbars
	 * @since 0.1.0
	 * @return void
	 */
	function toolbars( $toolbars ) {

		// Add new toolbars
		$toolbars['Simple Text'] = array();
		$toolbars['Simple Text'][1] = array( 'formatselect', 'bold' , 'italic', 'underline', 'link', 'unlink', 'alignleft', 'aligncenter', 'alignjustify', 'bullist', 'numlist' );

		$toolbars['Simple Title'] = array();
		$toolbars['Simple Title'][1] = array( 'bold' , 'italic', 'underline' );

		return $toolbars;

	}

	/**
	 * Initialize page templates
	 * @since 0.1.0
	 * @return void
	 */
	private function register_templates() {

		$home = new \Agrilife\PageTemplate( ALAF4_TEMPLATE_PATH, 'home.php', 'Home' );
		$home->register();

		$extension = new \Agrilife\PageTemplate( ALAF4_TEMPLATE_PATH, 'extension.php', 'Extension' );
		$extension->register();

		$research = new \Agrilife\PageTemplate( ALAF4_TEMPLATE_PATH, 'research.php', 'Research' );
		$research->register();

		$coals = new \Agrilife\PageTemplate( ALAF4_TEMPLATE_PATH, 'coals.php', 'Agriculture & Life Sciences' );
		$coals->register();

		$tvmdl = new \Agrilife\PageTemplate( ALAF4_TEMPLATE_PATH, 'tvmdl.php', 'TVMDL' );
		$tvmdl->register();

		$forest = new \Agrilife\PageTemplate( ALAF4_TEMPLATE_PATH, 'forest.php', 'Forest Service' );
		$forest->register();

		$comm = new \Agrilife\PageTemplate( ALAF4_TEMPLATE_PATH, 'communications.php', 'Communications' );
		$comm->register();

		$exceptional_item = new \Agrilife\PageTemplate( ALAF4_TEMPLATE_PATH, 'exceptional-item.php', 'Exceptional Item' );
		$exceptional_item->register();

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
