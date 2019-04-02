<?php
/**
 * Agrilife.org - AgriFlex4
 *
 * @package      Agrilife
 * @author       Zachary Watkins
 * @copyright    2018 Texas A&M AgriLife Communications
 * @license      GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:  Agrilife.org - AgriFlex4
 * Plugin URI:   https://github.com/AgriLife/af4-agrilife-org
 * Description:  Core functionality for Agrilife.org on AgriFlex4.
 * Version:      1.0.1
 * Author:       Zachary Watkins
 * Author URI:   https://github.com/ZachWatkins
 * Author Email: zachary.watkins@ag.tamu.edu
 * Text Domain:  af4-agrilife-org
 * License:      GPL-2.0+
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
 */

/* Autoload */
require 'vendor/autoload.php';

/* Define some useful constants */
define( 'ALAF4_DIRNAME', 'af4-agrilife-org' );
define( 'ALAF4_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'ALAF4_DIR_FILE', __FILE__ );
define( 'ALAF4_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'ALAF4_TEXTDOMAIN', 'af4-agrilife-org' );
define( 'ALAF4_TEMPLATE_PATH', ALAF4_DIR_PATH . 'templates' );

/* Code for plugins */
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'af4_agrilife_activation' );

/**
 * Helper option flag to indicate rewrite rules need flushing
 *
 * @since 0.1.0
 * @return void
 */
function af4_agrilife_activation() {
	$theme = wp_get_theme();
	if ( 'AgriFlex4' !== $theme->name ) {
		$error = sprintf(
			/* translators: %s: URL for plugins dashboard page */
			__(
				'Plugin NOT activated: The <strong>Agrilife.org - AgriFlex4 Plugin</strong> needs the <strong>AgriFlex4 Theme</strong> to be installed and activated first. <a href="%s">Back to plugins page</a>',
				'af4-college'
			),
			get_admin_url( null, '/plugins.php' )
		);
		wp_die( wp_kses_post( $error ) );
	}

	if ( ! get_option( 'af4_agrilife_flush_rewrite_rules_flag' ) ) {
		add_option( 'af4_agrilife_flush_rewrite_rules_flag', true );
	}
}

/**
 * The core plugin class that is used to initialize the plugin
 */
require ALAF4_DIR_PATH . 'src/class-agrilife.php';

/* Autoload all classes */
spl_autoload_register( 'Agrilife::autoload' );
Agrilife::get_instance();
