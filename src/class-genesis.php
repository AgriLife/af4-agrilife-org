<?php
/**
 * The file that hooks into the Genesis framework
 *
 * A class definition that includes hooks dependent on the Genesis framework
 *
 * @link       https://github.com/AgriLife/af4-agrilife-org/blob/master/src/class-genesis.php
 * @since      1.0.0
 * @package    af4-agrilife-org
 * @subpackage af4-agrilife-org/src
 */

namespace Agrilife;

/**
 * Sets up Genesis Framework to our needs
 *
 * @package Agrilife.org
 * @since 0.1.0
 */
class Genesis {

	/**
	 * Initialize the class
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function __construct() {

		// Remove header widget area.
		unregister_sidebar( 'header-right' );

	}

}
