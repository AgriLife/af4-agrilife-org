<?php
/**
 * The file that defines the Subsites plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/AgriLife/af4-agrilife-org/blob/master/src/class-subsites.php
 * @since      1.6.0
 * @package    af4-agrilife-org
 * @subpackage af4-agrilife-org/src
 */

namespace Agrilife;

/**
 * The subsites plugin class
 *
 * @since 1.6.0
 * @return void
 */
class Subsites {

	/**
	 * Initialize the class
	 *
	 * @since 1.6.0
	 * @return void
	 */
	public function __construct() {

		add_action( 'acf/init', array( $this, 'af4_theme_options_page' ), 11 );

		add_action( 'init', array( $this, 'register_subsite_menus' ) );

		add_action( 'genesis_after_header', array( $this, 'subsite_header' ), 11 );

		add_action( 'genesis_after_header', array( $this, 'do_subsite_menu' ), 11 );

		add_filter( 'wp_nav_menu', array( $this, 'modify_subsite_menu' ), 10, 2 );

		add_action( 'after_setup_theme', array( $this, 'add_image_sizes' ) );

	}

	public function add_image_sizes() {

		// Subsite header image, 10:1 aspect ratio.
		add_image_size( 'subsite_header_desktop_extra_large', 1920, 192, true );
		add_image_size( 'subsite_header_desktop_large', 1536, 153, true );
		add_image_size( 'subsite_header_desktop_medium', 1440, 144, true );
		add_image_size( 'subsite_header_desktop_medium_small', 1366, 136, true );
		// Subsite header image, 10:3 aspect ratio, mobile only.
		add_image_size( 'subsite_header_mobile_large', 1280, 384, true );
		add_image_size( 'subsite_header_mobile_small', 640, 192, true );

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
	 * Returns slug of current page's subsite.
	 *
	 * @param int $page_id The page ID to check.
	 * @since 1.6.5
	 * @return array | false
	 */
	private function get_page_subsite_field( $page_id ) {

		$field = get_field( 'subsites', 'option' );

		foreach ( $field as $menu ) {

			$menu_slug  = $this->menu_slug( $menu['name'] );
			$locations  = get_nav_menu_locations();
			$menu_obj   = get_term( $locations[ $menu_slug ], 'nav_menu' );
			$menu_items = wp_get_nav_menu_items( $menu_obj->term_id );

			foreach ( $menu_items as $menu_item ) {

				$menu_item_page_id = (int) get_post_meta( $menu_item->ID, '_menu_item_object_id', true );

				if ( $page_id === $menu_item_page_id ) {

					return $menu;

				}
			}
		}

		return false;

	}

	/**
	 * Returns array of menu information containing page id.
	 *
	 * @param int $page_id The page ID to check.
	 * @since 1.6.2
	 * @return array | false
	 */
	private function get_subsite_menu_of_page( $page_id ) {

		$field = get_field( 'subsites', 'option' );

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
				'label'             => 'Subsites',
				'name'              => 'subsites',
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
				'button_label'      => 'Add Subsite',
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
					array(
						'key'               => 'field_5f3436cfaaf8c',
						'label'             => 'Header',
						'name'              => 'header',
						'type'              => 'group',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'layout'            => 'block',
						'sub_fields'        => array(
							array(
								'key'               => 'field_5f3436e2aaf8d',
								'label'             => 'Image',
								'name'              => 'image',
								'type'              => 'image',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '',
									'class' => '',
									'id'    => '',
								),
								'return_format'     => 'array',
								'preview_size'      => 'medium',
								'library'           => 'all',
								'min_width'         => '',
								'min_height'        => '',
								'min_size'          => '',
								'max_width'         => '',
								'max_height'        => '',
								'max_size'          => '',
								'mime_types'        => 'jpg, jpeg',
							),
							array(
								'key'               => 'field_5f343c6a81d73',
								'label'             => 'Title',
								'name'              => 'title',
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
								'maxlength'         => '',
							),
							array(
								'key'               => 'field_5f343b7881d72',
								'label'             => 'Description',
								'name'              => 'description',
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
								'maxlength'         => '',
							),
						),
					),
				),
			)
		);
	}

	/**
	 * Register subsite menus based on custom fields.
	 *
	 * @since 1.6.0
	 * @return void
	 */
	public function register_subsite_menus() {

		$field = get_field( 'subsites', 'option' );

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

		$field   = get_field( 'subsites', 'option' );
		$page_id = get_the_ID();
		$menu    = $this->get_subsite_menu_of_page( $page_id );

		if ( false !== $menu ) {

			$menu_slug    = $menu['slug'];
			$menu_id      = $menu['id'];
			$menu_name    = $menu['name'];
			$menu_content = '<div id="%s" class="subsite-menu"><div class="sticky-menu anchorBottom" %s><div class="grid-container"><div class="grid-x grid-padding-x"><div class="subsite-title cell auto h4"><div class="grid-x"><div class="cell auto">%s</div><div class="cell shrink show-for-small-only"><div class="title-bars title-bar-right"><div class="title-bar title-bar-sub-navigation" data-responsive-toggle="nav-menu-secondary" style="display: inline-block;"><button class="menu-icon" type="button" data-toggle="nav-menu-secondary">&bull;&bull;&bull;<span class="screen-reader-text">Menu - %s</span></button></div></div></div></div></div><div class="cell small-12 medium-shrink"><div id="nav-menu-secondary">';

			echo wp_kses_post(
				sprintf(
					$menu_content,
					$menu_slug,
					'style="width:100%"',
					$menu_name,
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

			echo wp_kses_post( '</div></div></div></div></div></div>' );

		}

	}

	/**
	 * Filters the HTML content for subsite navigation menus.
	 *
	 * @since 1.6.5
	 *
	 * @param string   $nav_menu The HTML content for the navigation menu.
	 * @param stdClass $args     An object containing wp_nav_menu() arguments.
	 */
	public function modify_subsite_menu( $nav_menu, $args ) {

		$field = get_field( 'subsites', 'option' );

		foreach ( $field as $menu ) {

			$menu_slug = $this->menu_slug( $menu['name'] );

			if ( $menu_slug === $args->theme_location ) {

				$nav_menu = str_replace( '<ul', '<ul data-responsive-menu="accordion medium-dropdown"', $nav_menu );

			}
		}

		return $nav_menu;

	}

	/**
	 * Output the subsite header
	 *
	 * @since 1.6.6
	 * @param string $output The output of the Genesis header structural wrap.
	 * @return string
	 */
	public function subsite_header() {

		$page_id = get_the_ID();
		$field   = $this->get_page_subsite_field( $page_id );

		if ( false !== $field ) {

			// Image.
			$image_id     = $field['header']['image']['ID'];
			$image_meta   = wp_get_attachment_metadata( $image_id );
			$image_sizes  = array_keys( $image_meta['sizes'] );
			$desktop_size = '';
			if ( in_array( 'subsite_header_desktop_extra_large', $image_sizes, true ) ) {
				$desktop_size = 'subsite_header_desktop_extra_large';
			} elseif ( in_array( 'subsite_header_desktop_large', $image_sizes, true ) ) {
				$desktop_size = 'subsite_header_desktop_large';
			} elseif ( in_array( 'subsite_header_desktop_medium', $image_sizes, true ) ) {
				$desktop_size = 'subsite_header_desktop_medium';
			} elseif ( in_array( 'subsite_header_desktop_medium_small', $image_sizes, true ) ) {
				$desktop_size = 'subsite_header_desktop_medium_small';
			}
			$mobile_size = 'subsite_header_mobile_large';
			$mobile_img  = wp_get_attachment_image( $image_id, $mobile_size, false, array( 'class' => "hide-for-medium attachment-$mobile_size size-$mobile_size" ) );
			$desktop_img = wp_get_attachment_image( $image_id, $desktop_size, false, array( 'class' => "hide-for-small-only attachment-$desktop_size size-$desktop_size" ) );

			// Text.
			$site_title = $field['header']['title'];
			$site_description = $field['header']['description'];

			if ( ! empty( $site_title ) ) {
				$site_title = '<div class="title">' . $site_title . '</div>';
			}

			if ( ! empty( $site_description ) ) {
				$site_description = '<div class="subtitle">' . $site_description . '</div>';
			}

			// Output.
			$subsite_header = sprintf(
				'<div class="banner subsite-header">%s%s<div class="wrap"><div class="grid-container"><div class="banner-text">%s%s</div></div></div></div>',
				$mobile_img,
				$desktop_img,
				$site_title,
				$site_description
			);

			echo $subsite_header;

		}

	}


}
