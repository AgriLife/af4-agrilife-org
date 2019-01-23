<?php

function af4_agency_slug( $name ){

	$slug = strtolower( preg_replace( '/\s*&\s*|\s/', '_', $name ) );

	if($slug === 'agriculture_life_sciences')
		$slug = 'coals';
	if($slug === 'forest_service')
		$slug = 'forest';

	return $slug;

}

function af4_agency_full_name( $name ){

	switch ($name) {
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

function af4_responsive_img_atts( $path, $widths ){

	$srcset = array();
	$sizes = array();
	$len = count($widths);

	foreach ($widths as $key => $value) {
		$url = "{$path}-%s.jpg";
		$srcset[] = sprintf($url . ' %sw', $value, $value);
		if ($key !== $len) {
			$sizes[] = sprintf('(max-width: %spx) %spx', $value, $value);
		} else {
			$sizes[] = sprintf('%spx', $value);
		}
	}

	return sprintf(' srcset="%s" sizes="%s"',
		implode(', ', $srcset),
		implode(', ', $sizes)
	);

}

add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
add_filter( 'body_class', 'af4_agency_body_class' );
function af4_agency_body_class( $classes ){

	$agency = get_field('agency');
	$classes[] = 'agency-' . af4_agency_slug( $agency );

	return $classes;

}

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action( 'genesis_entry_content', 'af4_agency_header', 1 );
function af4_agency_header() {

	$agency = get_field('agency');
	$agency_slug = af4_agency_slug( $agency );
	$img_path = ALAF4_DIR_URL . "images/{$agency_slug}-header";

	?><div class="content-heading-image"><img class="background hide-for-medium" <?php

			echo "src=\"{$img_path}-small-640.jpg\"";
			echo af4_responsive_img_atts( "{$img_path}-small", array(
				640, 720, 800, 880, 960, 1040, 1280
			) );

		?>><img class="background show-for-medium" <?php

			echo "src=\"{$img_path}-background-1900.jpg\"";
			echo af4_responsive_img_atts( "{$img_path}-background", array(
				1024, 1200, 1440, 1900
			) );

		?>><div class="logo-wrap"><h1><?php

			echo sprintf( '<span class=screen-reader-text>%s</span><img src="%s/images/logo-%s.png" alt="%s">',
				$agency,
				AF_THEME_DIRURL,
				$agency_slug,
				$full_name
			);

		?></h1></div></div><?php

}

add_action( 'genesis_entry_content', 'af4_agency_content_wrap', 2 );
function af4_agency_content_wrap() {

	?><div class="introduction layout-container flow-block flow-arrow"><?php

}

add_action( 'genesis_entry_content', 'af4_agency_close_content_wrap', 11 );
function af4_agency_close_content_wrap() {

	$site_link = get_field('site_link');
	if( $site_link ){

		?><div class="buttons"><?php

			$domain = parse_url($site_link, PHP_URL_HOST);

			echo sprintf( '<a class="button" href="%s">Explore %s</a>',
				$site_link,
				$domain
			);

		?></div><?php

	}

	?></div><?php

}

add_action( 'genesis_entry_content', 'af4_agency_fields', 12 );
function af4_agency_fields() {

	$agency = get_field('agency');
	$full_name = af4_agency_full_name( $agency );
	$agency_slug = af4_agency_slug( $agency );
	$majorefforts_details = get_field('flowchart_group');
	$majorefforts_items = get_field('flowchart');
	$resources_items = get_field('resources')['items'];
	$director = get_field('director');
	$exceptional_items = get_field('exceptional_items');
	$site_link = get_field('site_link');
	$infographic = get_field('infographic');

	if( !empty($majorefforts_items) ){

		?><div class="majorefforts flow-block flow-arrow">
		<h2><?php echo $majorefforts_details['title']; ?></h2>
		<div class="layout-container"><?php

				$items = $majorefforts_items;
				$items_per_row = $agency_slug != 'coals' ? 3 : 2;

				// Build the rows as a multidimensional array
				$rows = array();
				while( count($items) > 0 ){
					$row = array();
					for ($i=0; $i < $items_per_row && count($items) > 0; $i++) {
						array_push( $row, array_shift( $items ) );
						if( $items_per_row == 3 && count($items) == 1){
							array_push( $row, array_shift( $items ) );
						}
					}
					array_push($rows, $row);
				}

				// Render the items
				foreach ($rows as $row) {

					?><div class="row bottom count-<?php echo count($row); ?>"><?php

						foreach ($row as $item) {

							?><div class="item"><?php

								$link = $item['link'];
								$text = "<span>{$item['text']}</span>";

								if( !empty( $link ) ){

									echo sprintf( '<a href="%s">%s</a>',
										$link,
										$text
									);

								} else {

									echo "<p>$text</p>";

								}

							?></div><?php

						}

					?></div><?php

				}

			?></div></div><?php

	}

	if( !empty($resources_items) ){

		?><div class="resources flow-block flow-arrow"><div class="layout-container"><h2><a name="r"></a>Resource<?php

			if( sizeof($resources_items) > 1 ){
				echo 's';
			}

		?></h2><div class="row"><?php

			foreach ($resources_items as $item) {

				$link = array(
					'open' => '',
					'close' => ''
				);

				$image = '';

				if( $item['image'] ){
					$image = sprintf('<img src="%s" alt="%s">',
						$item['image']['url'],
						$item['image']['alt']
					);
				}

				if( $item['link'] ){
					$link['open'] = "<a href=\"{$item['link']}\">";
					$link['close'] = '</a>';
				}

				echo sprintf( '<div class="item"><h3>%s</h3>%s%s%s</div>',
					$item['title'],
					$link['open'],
					$image,
					$link['close']
				);
			}

		?></div></div></div><?php

	}

	// Display infographic
	?><div class="infographic flow-block<?php

		if( array_filter($exceptional_items) ){
			echo ' flow-arrow';
		}

	?>"><?php

		switch ($agency_slug) {
			case 'coals':
				?><div class="wrap"><div class="heading">Established in <div class="date">1911</div></div><img src="<?php echo ALAF4_DIR_URL;?>images/coals-infographic.png" alt="Degree programs: 31 undergraduate, 37 master's, 24 doctoral, and 6 online graduate; 14 Academic departments; 7,876 COALS students; 63,599 Texas A&M Students"></div><?php
				break;
			case 'tvmdl':
				?><div class="wrap"><div class="heading">Established in <div class="date">1967</div></div><img src="<?php echo ALAF4_DIR_URL;?>images/tvmdl-infographic.png" alt="160,000 annual caseloads; 768,000 average tests per year; $17.3 million FY2017 operating budget"></div><?php
				break;
			case 'extension':
				?><div class="wrap"><div class="heading">Established in <div class="date">1915</div></div><div class="image-overlay"><img src="<?php echo ALAF4_DIR_URL;?>images/extension-infographic-main.png" alt="81,292 volunteers supporting extension programs; $158 million FY2017 operating budget including county funds;"><img class="overlay" src="<?php echo ALAF4_DIR_URL;?>images/extension-infographic-overlay.png" alt="250 counties with an extension office"></div><iframe src="//agrilife.org/locations/type/1" frameborder="0" allowfullscreen></iframe></div><?php
				break;
			case 'research':
				?><div class="wrap"><div class="heading">Established in <div class="date">1887</div></div><div class="image-overlay"><img src="<?php echo ALAF4_DIR_URL;?>images/research-infographic-main.png" alt="#1 FY17 Agriculture Research Expenditures - NSF Higher Education Research and Development Survey FY17"><hr /><br class="show-for-medium"><img class="overlay" src="<?php echo ALAF4_DIR_URL;?>images/research-infographic-overlay.png" alt="13 locations Centers | Divisions"></div><iframe src="//agrilife.org/locations/type/2" frameborder="0" allowfullscreen></iframe></div><?php
				break;
			case 'forest':
				?><div class="wrap"><div class="heading">Established in <div class="date">1915</div></div><div class="image-overlay"><img src="<?php echo ALAF4_DIR_URL;?>images/forest-infographic-main.png" alt="$265 million in assistance to Volunteer Firefighters; $81.9 million FY 2017 operating budget"><img class="overlay" src="<?php echo ALAF4_DIR_URL;?>images/forest-infographic-overlay.png" alt="65 locations; 25 work stations; 40 offices"></div><iframe src="//agrilife.org/locations/type/4" frameborder="0" allowfullscreen></iframe></div><?php
				break;
			default:
				break;
		}

	?></div><?php

	if( array_filter($exceptional_items) ){

		?><div class="exceptional-items flow-block"><div class="layout-container"><h2><a name="ei"></a><?php

			if( count($exceptional_items['items']) > 1 ){
				echo 'Exceptional Items';
			} else {
				echo 'Exceptional Item';
			}

		?></h2><?php

			if( !empty( $exceptional_items['introduction'] ) ){

				?><div class="row"><?php

				echo "<div class=\"text\">{$exceptional_items['introduction']}</div>";

				?></div><?php
			}

			if( count($exceptional_items['items']) > 0 ){

				?><div class="row"><?php

				foreach ( $exceptional_items['items'] as $key => $item ) {

					$link = array(
						'open' => '',
						'close' => ''
					);

					$image = '';

					if( $item['image'] ){
						$image = sprintf('<div class="photo"><img src="%s" alt="%s"></div>',
							$item['image']['url'],
							$item['image']['alt']
						);
					}

					if( $item['link'] ){
						$link['open'] = "<a href=\"{$item['link']}\">";
						$link['close'] = '</a>';
					}

					echo sprintf( '<div class="item">%s%s<h3>%s</h3>%s<div class="description">%s</div></div>',
						$link['open'],
						$image,
						$item['title'],
						$link['close'],
						$item['description']
					);
				}

				?></div><?php

			}

		?></div></div><?php

	}

	?></div><?php

	if( $director ){

		?><div class="director"><div class="layout-container"><div class="text-column"><div class="quote"><?php

			echo $director['quote'];

		?></div><div class="creds"><?php

			echo $director['name'];
			echo $director['contact_info'];

		?></div></div><div class="photo-column"><?php

			$image = $director['photo'];
			if($image){
				echo "<img src=\"{$image['sizes']['medium_large']}\" alt=\"{$director['name']}\">";
			}

		?></div></div></div><?php

	}

}

get_header();
genesis();
