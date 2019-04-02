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

		// Register script for single-agency page template.
		add_action( 'wp_enqueue_scripts', array( $this, 'register_agency_script' ) );

		// Register global styles used in the theme.
		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles' ), 2 );

		// Enqueue extension styles.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 2 );

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
	 * @return void
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'agrilife-styles' );

		if ( is_page_template( 'home.php' ) ) {
			wp_enqueue_style( 'agrilife-home-styles' );
		}

	}

	/**
	 * Registers the agency script
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function register_agency_script() {

		wp_register_script(
			'af4-agrilife-org-single-agency',
			ALAF4_DIR_URL . 'js/exceptional-item.min.js',
			array(),
			filemtime( ALAF4_DIR_PATH . 'js/exceptional-item.min.js' ),
			true
		);

	}


}
