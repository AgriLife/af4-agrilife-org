<?php

add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_entry_content', 'af4_ei_right_column', 1 );
function af4_ei_right_column() {

	?><div class="right" data-sticky-container><div class="wrap" data-sticky data-anchor="left-column" data-margin-top="6">
			<div class="logos"><?php

				$logos = get_field('logos');

				if( $logos ){

					foreach ( $logos as $key => $value) {

						$value = $value['image'];
						$srcset = wp_get_attachment_image_srcset($value['ID']) || 'srcset';
						$image = wp_get_attachment_image($value['ID'], 'full', false, $srcset);
						echo sprintf( '<span class="%s">%s</span>',
							$value['name'],
							$image
						);

					}

				}

			?></div>
			<div class="text">
				<div class="request"><?php

					$request_fields = get_field('request');

				?><h3>Exceptional Item Requestion FY <?php echo $request_fields['year']; ?></h3>
					<div class="value"><?php echo $request_fields['amount']; ?></div>
				</div>
				<hr />
				<h3>Objective</h3>
				<p><?php echo $request_fields['objective']; ?></p>
			</div>
			<div class="pdf"><?php

				$pdf_field = get_field('pdf');

				$pdf_link = $pdf_field['file'];
				$link = sprintf( '<a href="%s" title="%s">',
					$pdf_link['url'],
					$pdf_link['title']
				);

				$pdf_thumb = $pdf_field['thumbnail'];
				$thumb_id = $pdf_thumb['ID'];
				$srcset = wp_get_attachment_image_srcset($thumb_id) || 'srcset';
				$image = wp_get_attachment_image($thumb_id, 'full', false, $srcset);
				$pdf = sprintf( '%s%s<span>Print-Friendly PDF</span></a>',
					$link,
					$image
				);

				echo $pdf;

			?></div>
		</div>
	</div><?php

}

add_action( 'genesis_entry_content', 'af4_ei_left_wrap', 2 );
function af4_ei_left_wrap() {

	?><div id="left-column" class="left"><?php

}

add_action( 'genesis_entry_content', 'af4_ei_director_contact', 10 );
function af4_ei_director_contact() {

	$director = get_field('director');
	?><div class="contacts"><div class="item-director"><?php

		$image_obj = $director['image'];
		$image_id = $image_obj['ID'];
		$image_sizes = $image_obj['sizes'];
		$url = wp_get_attachment_image_url( $image_id );
		$alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

		$image = sprintf( '<img src="%s" alt="%s">',
			$url,
			$alt
		);

		echo $image;
		echo $director['description'];

	?></div><div class="contact"><h2>Contact</h2><?php

		echo get_field('contact_information');

	?></div></div><?php

}

add_action( 'genesis_entry_content', 'af4_ei_close_left_wrap', 11 );
function af4_ei_close_left_wrap() {

	?></div><?php

}

get_header();
genesis();
