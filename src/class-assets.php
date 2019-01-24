<?php
/**
 * The file that defines css and js files loaded for the plugin
 *
 * A class definition that includes css and js files used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/AgriLife/af4-agrilife-org/blob/master/src/class-assets.php
 * @since      1.0.0
 * @package    af4-agrilife-org
 * @subpackage af4-agrilife-org/src
 */

namespace Agrilife;

/**
 * Add assets
 *
 * @package Agrilife.org
 * @since 0.1.0
 */
class Assets {

	/**
	 * Initialize the class
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function __construct() {

		// Register global styles used in the theme.
		add_action( 'admin_footer', array( $this, 'register_admin_styles' ) );

		// Register global styles used in the theme.
		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles' ) );

		// Enqueue extension styles.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

		// Dequeue default styles.
		add_action( 'wp_print_styles', array( $this, 'dequeue_default_styles' ), 5 );

	}

	/**
	 * Registers all admin styles used within the plugin
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function register_admin_styles() {
		wp_register_style(
			'agrilife-admin-styles',
			ALAF4_DIR_URL . 'css/admin.css',
			array(),
			filemtime( ALAF4_DIR_PATH . 'css/admin.css' ),
			'screen'
		);

		wp_enqueue_style( 'agrilife-admin-styles' );
	}

	/**
	 * Registers all styles used within the plugin
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function register_styles() {

		wp_register_style(
			'agrilife-googlefonts',
			'https://fonts.googleapis.com/css?family=Oswald|Monoton|Open+Sans',
			array(),
			'1.0.0'
		);

		wp_register_style(
			'agrilife-styles',
			ALAF4_DIR_URL . 'css/agrilife.css',
			array(),
			filemtime( ALAF4_DIR_PATH . 'css/agrilife.css' ),
			'screen'
		);

		wp_register_style(
			'agrilife-home-styles',
			ALAF4_DIR_URL . 'css/home.css',
			array(),
			filemtime( ALAF4_DIR_PATH . 'css/home.css' ),
			'screen'
		);

	}

	/**
	 * Enqueues extension styles
	 *
	 * @since 0.1.0
	 * @global $wp_styles
	 * @return void
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'agrilife-googlefonts' );

		wp_enqueue_style( 'agrilife-styles' );

		if ( is_page_template( 'home.php' ) ) {
			wp_enqueue_style( 'agrilife-home-styles' );
		}

	}

	/**
	 * Dequeues global styles
	 *
	 * @since 1.0
	 * @global $wp_styles
	 * @return void
	 */
	public function dequeue_default_styles() {

		wp_dequeue_style( 'agriflex-default-styles' );

	}

}