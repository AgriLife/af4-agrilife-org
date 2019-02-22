<?php
/**
 * The file that renders single Agency posts
 *
 * A custom post template for single Agency post views
 *
 * @link       https://github.com/AgriLife/af4-agrilife-org/blob/master/templates/single-agency.php
 * @since      0.1.0
 * @package    af4-agrilife-org
 * @subpackage af4-agrilife-org/templates
 */

add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
add_filter( 'body_class', 'af4_agency_body_class' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_entry_content', 'af4_agency_header', 1 );
add_action( 'genesis_entry_content', 'af4_agency_content_wrap', 2 );
add_action( 'genesis_entry_content', 'af4_agency_close_content_wrap', 11 );
add_action( 'genesis_entry_content', 'af4_agency_fields', 12 );

/**
 * Retrieve the slug using the agency full name
 *
 * @since 0.1.0
 * @param string $name The full name of the agency.
 * @return string
 */
function af4_agency_slug( $name ) {

	$slug = strtolower( preg_replace( '/\s*&\s*|\s/', '_', $name ) );

	if ( 'agriculture_life_sciences' === $slug ) {
		$slug = 'coals';
	}

	if ( 'forest_service' === $slug ) {
		$slug = 'forest';
	}

	return $slug;

}

/**
 * Retrieve the truly full name of the agency
 *
 * @since 0.1.0
 * @param string $name The somewhat-full name of the agency.
 * @return string
 */
function af4_agency_full_name( $name ) {

	switch ( $name ) {
		case 'Agriculture & Life Sciences':
			$name = 'College of ' . $name;
			break;
		case 'TVMDL':
			$name = 'Veterinary Medical Diagnostic Laboratory';
			break;
		case 'Extension':
		case 'Research':
			$name = 'AgriLife ' . $name;
			break;
		default:
			break;
	}

	return 'Texas A&M ' . $name;

}

/**
 * Generate responsive image attributes given an image path and widths.
 *
 * @since 0.1.0
 * @param string $path URL path before the file name.
 * @param array  $widths Window width breakpoints and file name suffixes to generate.
 * @return array
 */
function af4_responsive_img_atts( $path, $widths ) {

	$srcset = array();
	$sizes  = array();
	$len    = count( $widths );

	foreach ( $widths as $key => $value ) {
		$url      = "{$path}-%s.jpg";
		$srcset[] = sprintf( $url . ' %sw', $value, $value );
		if ( $key !== $len ) {
			$sizes[] = sprintf( '(max-width: %spx) %spx', $value, $value );
		} else {
			$sizes[] = sprintf( '%spx', $value );
		}
	}

	return sprintf(
		' srcset="%s" sizes="%s"',
		implode( ', ', $srcset ),
		implode( ', ', $sizes )
	);

}

/**
 * Add the agency to the body class
 *
 * @since 0.1.0
 * @param array $classes Current body classes.
 * @return array
 */
function af4_agency_body_class( $classes ) {

	$agency    = get_field( 'agency' );
	$classes[] = 'agency-' . af4_agency_slug( $agency );

	return $classes;

}

/**
 * Provide content for the header
 *
 * @since 0.1.0
 * @return void
 */
function af4_agency_header() {

	$agency               = get_field( 'agency' );
	$agency_slug          = af4_agency_slug( $agency );
	$full_name            = af4_agency_full_name( $agency );
	$img_path             = ALAF4_DIR_URL . "images/{$agency_slug}-header";
	$responsive_img_small = af4_responsive_img_atts(
		"{$img_path}-small",
		array( 640, 720, 800, 880, 960, 1040, 1280 )
	);
	$responsive_img_large = af4_responsive_img_atts(
		"{$img_path}-background",
		array( 1024, 1200, 1440, 1900 )
	);

	echo sprintf(
		'<div class="content-heading-image"><img class="background hide-for-medium" src="%s-small-640.jpg"%s><img class="background show-for-medium" src="%s-background-1900.jpg"%s><div class="logo-wrap"><h1><span class=screen-reader-text>%s</span><img src="%s/images/logo-%s.png" alt="%s"></h1></div></div>',
		esc_url( $img_path ),
		wp_kses_post( $responsive_img_small ),
		esc_url( $img_path ),
		wp_kses_post( $responsive_img_large ),
		esc_html( $agency ),
		esc_url( AF_THEME_DIRURL ),
		esc_attr( $agency_slug ),
		esc_attr( $full_name )
	);

}

/**
 * Provide the open wrap for the introduction content area
 *
 * @since 0.1.0
 * @return void
 */
function af4_agency_content_wrap() {

	echo '<div class="introduction layout-container flow-block flow-arrow">';

}

/**
 * Provide the agency button and close content wrap
 *
 * @since 0.1.0
 * @return void
 */
function af4_agency_close_content_wrap() {

	$site_link = get_field( 'site_link' );

	if ( $site_link ) {

		$domain = wp_parse_url( $site_link, PHP_URL_HOST );

		echo sprintf(
			'<div class="buttons"><a class="button" href="%s">Explore %s</a></div>',
			esc_url( $site_link ),
			esc_attr( $domain )
		);

	}

	echo '</div>';

}

/**
 * Provide the remaining agency content blocks
 *
 * @since 0.1.0
 * @return void
 */
function af4_agency_fields() {

	$agency               = get_field( 'agency' );
	$full_name            = af4_agency_full_name( $agency );
	$agency_slug          = af4_agency_slug( $agency );
	$majorefforts_details = get_field( 'flowchart_group' );
	$majorefforts_items   = get_field( 'flowchart' );
	$resources_items      = get_field( 'resources' )['items'];
	$director             = get_field( 'director' );
	$exceptional_items    = get_field( 'exceptional_items' );
	$social_coals         = get_field( 'coals_social' );
	$site_link            = get_field( 'site_link' );
	$infographic          = get_field( 'infographic' );

	// Major Efforts.
	if ( ! empty( $majorefforts_items ) ) {

		$items         = $majorefforts_items;
		$items_per_row = 'coals' !== $agency_slug ? 3 : 2;
		$rows          = array();
		$item_count    = count( $items );
		$items_html    = '';

		// Build the rows as a multidimensional array.
		for ( $i = 0; $i < $item_count; $i++ ) {

			$row = array();

			for ( $j = 0; $j < $items_per_row; $j++ ) {

				if ( count( $items ) > 0 ) {

					array_push( $row, array_shift( $items ) );

					if ( 3 === $items_per_row && 1 === count( $items ) ) {

						array_push( $row, array_shift( $items ) );

					}
				}
			}

			array_push( $rows, $row );

			if ( 0 === count( $items ) ) {
				break;
			}
		}

		// Render the items.
		foreach ( $rows as $row ) {

			$row_html = '';

			foreach ( $row as $item ) {

				$link = $item['link'];
				$text = sanitize_text_field( $item['text'] );

				if ( ! empty( $link ) ) {

					$row_html .= sprintf(
						'<div class="item"><a href="%s"><span>%s</span></a></div>',
						esc_url( $link ),
						esc_html( $text )
					);

				} else {

					$row_html .= sprintf(
						'<div class="item"><p><span>%s</span></p></div>',
						esc_html( $text )
					);

				}
			}

			$items_html .= sprintf(
				'<div class="row bottom count-%s">%s</div>',
				count( $row ),
				$row_html
			);

		}

		echo sprintf(
			'<div class="majorefforts flow-block flow-arrow"><h2>%s</h2><div class="layout-container">%s</div></div>',
			esc_html( $majorefforts_details['title'] ),
			wp_kses_post( $items_html )
		);

	}

	// Infographic.
	$infographic_output = '';

	switch ( $agency_slug ) {
		case 'coals':
			$infographic_output = '<div class="wrap"><div class="heading">Established in <div class="date">1911</div></div><img src="%simages/coals-infographic.png" alt="Degree programs: 31 undergraduate, 37 master\'s, 24 doctoral, and 6 online graduate; 14 Academic departments; 7,876 COALS students; 63,599 Texas A&M Students"></div>';
			break;
		case 'tvmdl':
			$infographic_output = '<div class="wrap"><div class="heading">Established in <div class="date">1967</div></div><img src="%simages/tvmdl-infographic.png" alt="160,000 annual caseloads; 768,000 average tests per year; $17.3 million FY2017 operating budget"></div>';
			break;
		case 'extension':
			$infographic_output = '<div class="wrap"><div class="heading">Established in <div class="date">1915</div></div><div class="image-overlay"><img src="%simages/extension-infographic-main.png" alt="81,292 volunteers supporting extension programs; $158 million FY2017 operating budget including county funds;"><img class="overlay" src="%simages/extension-infographic-overlay.png" alt="250 counties with an extension office"></div><iframe src="//agrilife.org/locations/type/1" frameborder="0" allowfullscreen></iframe></div>';
			break;
		case 'research':
			$infographic_output = '<div class="wrap"><div class="heading">Established in <div class="date">1887</div></div><div class="image-overlay"><img src="%simages/research-infographic-main.png" alt="#1 FY17 Agriculture Research Expenditures - NSF Higher Education Research and Development Survey FY17"><hr /><br class="show-for-medium"><img class="overlay" src="%simages/research-infographic-overlay.png" alt="13 locations Centers | Divisions"></div><iframe src="//agrilife.org/locations/type/2" frameborder="0" allowfullscreen></iframe></div>';
			break;
		case 'forest':
			$infographic_output = '<div class="wrap"><div class="heading">Established in <div class="date">1915</div></div><div class="image-overlay"><img src="%simages/forest-infographic-main.png" alt="$265 million in assistance to Volunteer Firefighters; $81.9 million FY 2017 operating budget"><img class="overlay" src="%simages/forest-infographic-overlay.png" alt="65 locations; 25 work stations; 40 offices"></div><iframe src="//agrilife.org/locations/type/4" frameborder="0" allowfullscreen></iframe></div>';
			break;
		default:
			break;
	}

	echo sprintf(
		'<div class="infographic flow-block flow-arrow">%s</div>',
		wp_kses_post( str_replace( '%s', ALAF4_DIR_URL, $infographic_output ) )
	);

	// Exceptional Items.
	if ( 'coals' !== $agency_slug && array_filter( $exceptional_items ) ) {

		$title        = count( $exceptional_items['items'] ) > 1 ? 'Exceptional Items' : 'Exceptional Item';
		$introduction = '';
		$items_html   = '';

		if ( ! empty( $exceptional_items['introduction'] ) ) {

			$introduction = sprintf(
				'<div class="row"><div class="text">%s</div></div>',
				wp_kses_post( $exceptional_items['introduction'] )
			);

		}

		if ( count( $exceptional_items['items'] ) > 0 ) {

			$items = '';

			foreach ( $exceptional_items['items'] as $item ) {

				$link = array(
					'open'  => '',
					'close' => '',
				);

				$image = '';

				if ( $item['image'] ) {
					$image = sprintf(
						'<div class="photo"><img src="%s" alt="%s"></div>',
						$item['image']['url'],
						$item['image']['alt']
					);
				}

				if ( $item['link'] ) {
					$link['open']  = "<a href=\"{$item['link']}\">";
					$link['close'] = '</a>';
				}

				$items .= sprintf(
					'<div class="item">%s%s<h3>%s</h3>%s<div class="description">%s</div></div>',
					wp_kses_post( $link['open'] ),
					wp_kses_post( $image ),
					esc_html( $item['title'] ),
					wp_kses_post( $link['close'] ),
					wp_kses_post( $item['description'] )
				);
			}

			$items_html = sprintf(
				'<div class="row">%s</div>',
				$items
			);

		}

		echo sprintf(
			'<div class="exceptional-items flow-block"><div class="layout-container"><h2><a name="ei"></a>%s</h2>%s%s</div></div>',
			esc_html( $title ),
			wp_kses_post( $introduction ),
			wp_kses_post( $items_html )
		);

	}

	// Social.
	if ( $social_coals ) {

		$title = '';

		if ( $social_coals['title'] ) {

			$title = sprintf(
				'<h2>%s</h2>',
				sanitize_text_field( $social_coals['title'] )
			);

		}

		echo sprintf(
			'<div class="resources flow-block"><div class="layout-container">%s%s</div></div>',
			wp_kses_post( $title ),
			wp_kses_post( $social_coals['content'] )
		);
	}

	// Resources.
	if ( ! empty( $resources_items ) ) {

		$title = count( $resources_items ) > 1 ? 'Resources' : 'Resource';
		$items = '';

		foreach ( $resources_items as $item ) {

			$link = array(
				'open'  => '',
				'close' => '',
			);

			$image = '';

			if ( $item['image'] ) {
				$image = sprintf(
					'<img src="%s" alt="%s">',
					$item['image']['url'],
					$item['image']['alt']
				);
			}

			if ( $item['link'] ) {
				$link['open']  = "<a href=\"{$item['link']}\">";
				$link['close'] = '</a>';
			}

			$items .= sprintf(
				'<div class="item"><h3>%s</h3>%s%s%s</div>',
				esc_html( $item['title'] ),
				$link['open'],
				$image,
				$link['close']
			);
		}

		echo sprintf(
			'<div class="resources flow-block"><div class="layout-container"><h2><a name="r"></a>%s</h2><div class="row">%s</div></div></div>',
			esc_html( $title ),
			wp_kses_post( $items )
		);

	}

	// Director.
	if ( $director ) {

		$quote = sprintf(
			'<div class="quote">%s</div>',
			sanitize_textarea_field( $director['quote'] )
		);

		$creds = sprintf(
			'<div class="creds">%s%s</div>',
			sanitize_text_field( $director['name'] ),
			$director['contact_info']
		);

		$image = $director['photo'];
		$photo = '';

		if ( $image ) {
			$photo = "<img src=\"{$image['sizes']['medium_large']}\" alt=\"{$director['name']}\">";
		}

		$photo = sprintf(
			'<div class="photo-column">%s</div>',
			$photo
		);

		echo sprintf(
			'<div class="director"><div class="layout-container"><div class="text-column">%s</div>%s</div></div>',
			wp_kses_post( $quote . $creds ),
			wp_kses_post( $photo )
		);

	}

}

get_header();
genesis();
