<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/AgriLife/af4-agrilife-org/blob/master/src/class-subsite-menus.php
 * @since      1.6.0
 * @package    af4-agrilife-org
 * @subpackage af4-agrilife-org/src
 */

namespace Agrilife;

/**
 * The core plugin class
 *
 * @since 1.6.0
 * @return void
 */
class Subsite_Menus {

	/**
	 * Initialize the class
	 *
	 * @since 1.6.0
	 * @return void
	 */
	public function __construct() {

		add_action( 'acf/init', array( $this, 'af4_theme_options_page' ), 11 );

		add_action( 'init', array( $this, 'register_subsite_menus' ) );

		add_action( 'genesis_header', array( $this, 'do_subsite_menu' ), 16 );

		add_action( 'wp', array( $this, 'remove_sticky_header' ) );

	}

	/**
	 * Return the slug form of a navigation menu display name.
	 *
	 * @since 1.6.0
	 * @param string $name The display name of the navigation menu.
	 *
	 * @return string
	 */
	private function menu_slug( $name ) {

		return str_replace( '-', '_', sanitize_title( $name ) ) . '_menu';

	}

	/**
	 * Returns array of menu information containing page id.
	 *
	 * @param int $page_id The page ID to check.
	 * @since 1.6.2
	 * @return array | false
	 */
	private function get_subsite_menu_of_page( $page_id ) {

		$field = get_field( 'subsite_menus', 'option' );

		foreach ( $field as $menu ) {

			$menu_slug  = $this->menu_slug( $menu['name'] );
			$locations  = get_nav_menu_locations();
			$menu_obj   = get_term( $locations[ $menu_slug ], 'nav_menu' );
			$menu_items = wp_get_nav_menu_items( $menu_obj->term_id );

			foreach ( $menu_items as $menu_item ) {

				$menu_item_page_id = (int) get_post_meta( $menu_item->ID, '_menu_item_object_id', true );

				if ( $page_id === $menu_item_page_id ) {
					return array(
						'name' => $menu_obj->name,
						'slug' => $menu_slug,
						'id'   => $menu_obj->term_id,
					);
				}
			}
		}

		return false;

	}

	/**
	 * Add Options Fields
	 *
	 * @since 1.6.0
	 *
	 * @return void
	 */
	public function af4_theme_options_page() {

		acf_add_local_field(
			array(
				'parent'            => 'group_5e14d2d88b326',
				'key'               => 'field_5f0f561adf8d4',
				'label'             => 'Subsite Menus',
				'name'              => 'subsite_menus',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'collapsed'         => '',
				'min'               => 0,
				'max'               => 0,
				'layout'            => 'block',
				'button_label'      => 'Add Menu',
				'sub_fields'        => array(
					array(
						'key'               => 'field_5f0f567ead2cf',
						'label'             => 'Name',
						'name'              => 'name',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => 144,
					),
				),
			)
		);
	}

	/**
	 * Remove sticky header attributes and elements if displaying a subsite menu.
	 *
	 * @since 1.6.3
	 *
	 * @return void
	 */
	public function remove_sticky_header() {

		$field   = get_field( 'subsite_menus', 'option' );
		$page_id = get_the_ID();
		$menu    = $this->get_subsite_menu_of_page( $page_id );

		if ( false !== $menu ) {

			global $af_genesis;
			remove_filter( 'genesis_structural_wrap-header', array( $af_genesis, 'sticky_header_container' ), 10, 2 );
			remove_action( 'genesis_header', array( $af_genesis, 'sticky_header_wrap_open' ), 6 );
			remove_action( 'genesis_header', array( $af_genesis, 'sticky_header_wrap_close' ), 13 );

		}

	}

	/**
	 * Register subsite menus based on custom fields.
	 *
	 * @since 1.6.0
	 * @return void
	 */
	public function register_subsite_menus() {

		$field = get_field( 'subsite_menus', 'option' );

		if ( $field ) {

			$locations = array();

			foreach ( $field as $subsite ) {

				$name               = $subsite['name'] . ' Navigation Menu';
				$slug               = $this->menu_slug( $subsite['name'] );
				$locations[ $slug ] = __( $name, 'af4-agrilife-org' ); // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText

			}

			register_nav_menus( $locations );

		}

	}

	/**
	 * Display subsite menu.
	 *
	 * @since 1.6.0
	 *
	 * @return void
	 */
	public function do_subsite_menu() {

		$field   = get_field( 'subsite_menus', 'option' );
		$page_id = get_the_ID();
		$menu    = $this->get_subsite_menu_of_page( $page_id );

		if ( false !== $menu ) {

			$menu_slug = $menu['slug'];
			$menu_id   = $menu['id'];
			$menu_name = $menu['name'];

			echo wp_kses_post(
				sprintf(
					'<div id="%s" class="subsite-menu" data-sticky-container><div data-sticky data-top-anchor="site-header:bottom" %s><div class="grid-container"><div class="grid-x grid-padding-x"><div class="subsite-title cell auto h4">%s</div><div class="cell shrink">',
					$menu_slug,
					'style="width:100%"',
					$menu_name
				)
			);

			genesis_nav_menu(
				[
					'theme_location'  => $menu_slug,
					'container_class' => 'grid-container',
					'menu_class'      => 'menu grid-x grid-padding-x',
				]
			);

			echo wp_kses_post( '</div></div></div></div></div>' );

		}

	}

}