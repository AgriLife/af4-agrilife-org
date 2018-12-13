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

	?><div class="content-heading-image flow-arrow">
		<div class="wrap">
			<img class="background hide-for-medium" <?php

				echo "src=\"{$img_path}-small-640.jpg\"";
				echo af4_responsive_img_atts( "{$img_path}-small", array(
					640, 720, 800, 880, 960, 1040, 1280
				) );

			?>><img class="background show-for-medium" <?php

				echo "src=\"{$img_path}-background-1900.jpg\"";
				echo af4_responsive_img_atts( "{$img_path}-background", array(
					1024, 1200, 1440, 1900
				) );

			?>>
			<h1><?php echo $agency; ?></h1>
		</div>
	</div><?php

}

add_action( 'genesis_entry_content', 'af4_agency_content_wrap', 2 );
function af4_agency_content_wrap() {

	?><div class="introduction layout-container flow-arrow"><?php

}

add_action( 'genesis_entry_content', 'af4_agency_close_content_wrap', 11 );
function af4_agency_close_content_wrap() {

	?></div><?php

}

add_action( 'genesis_entry_content', 'af4_agency_fields', 12 );
function af4_agency_fields() {

	$agency = get_field('agency');
	$full_name = af4_agency_full_name( $agency );
	$agency_slug = af4_agency_slug( $agency );
	$director = get_field('director');
	$flowchart = get_field('flowchart');
	$exceptional_items = get_field('exceptional_items');
	$site_link = get_field('site_link');

	if( !empty($flowchart) ){

		?><div class="flowchart brackets flow-arrow">
		<div class="layout-container">
			<div class="flowchart-row top">
				<div class="item"><?php
					echo sprintf( '<a href="%s"><span><img src="%s/images/logo-%s.png" alt="%s"></span></a>',
						$site_link,
						AF_THEME_DIRURL,
						$agency_slug,
						$full_name
					);
				?></div>
			</div><?php

				$items = $flowchart;
				$rows = ceil( count($items) / 5);

				for ($i=0; $i < $rows; $i++) {

					$start_index = $i * 5;
					$count = count($items) - $start_index;
					$sub_count = $count >= 5 ? 5 : $count % 5;

					?><div class="flowchart-row <?php

						if( $sub_count === 5 ){
							echo 'full-row ';
						}

					?>bottom"><?php

						for ($j=0; $j < $sub_count; $j++) {

							$item = $items[$start_index + $j];

							?><div class="item"><?php

								$link = $item['link'];
								$text = "<span>{$item['text']}</span>";

								if( !empty( $link ) ){

									echo sprintf( '<a href="%s">%s<span class="arrow"><img src="%s/images/urarr-48x48.png"></span></a>',
										$link,
										$text,
										ALAF4_DIR_URL
									);

								} else {

									echo "<p>$text</p>";

								}

							?></div><?php

						}

					?></div><?php

				}

			?></div>
		</div><?php

	}

	if( $site_link ){

		?><div class="buttons flow-arrow"><?php

			$domain = parse_url($site_link, PHP_URL_HOST);

			echo sprintf( '<a class="button" href="%s">%s</a>',
				$site_link,
				$domain
			);

		?></div><?php

	}

	if( array_filter($exceptional_items) ){

		?><div class="exceptional-items"><div class="layout-container"><h2>Exceptional Items</h2><?php

			if( !empty( $exceptional_items['introduction'] ) ){

				?><div class="row"><?php

				echo "<div class=\"text\">{$exceptional_items['introduction']}</div>";

				?></div><?php
			}

			if( count($exceptional_items['items']) > 0 ){

				?><div class="row"><?php

				foreach ( $exceptional_items['items'] as $key => $item ) {
					echo sprintf( '<div class="item"><div class="photo"><img src="%s" alt="%s"></div><h3>%s</h3><div class="description">%s</div></div>',
						$item['image']['url'],
						$item['image']['alt'],
						$item['title'],
						$item['description']
					);
				}

				?></div><?php

			}

		?></div></div></div><?php

	}

	if( $director ){

		?><div class="director<?php

			if( get_field('strategic_plan') ){

				echo ' with-strategic-plan';

			}

		?>"><div class="layout-container"><div class="text-column"><div class="quote"><?php

			echo $director['quote'];

		?></div><div class="creds"><?php

			echo $director['name'];
			echo $director['contact_info'];

		?></div></div><div class="photo-column"><?php

			echo "<img src=\"" . ALAF4_DIR_URL . "images/{$agency_slug}-director.jpg\" alt=\"{$director['name']}\">";

		?></div></div><?php

			$plan = get_field('strategic_plan');

			if( $plan ){

				echo "<div class=\"strategic-plan\"><a class=\"button\" href=\"{$plan}\">Strategic Plan</a></div>";

			}

		?></div><?php

	}

}

get_header();
genesis();
