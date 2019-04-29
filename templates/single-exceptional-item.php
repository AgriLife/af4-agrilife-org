<?php
/**
 * The file that renders Exceptional Item posts
 *
 * A custom post template for single Exceptional Item post views
 *
 * @link       https://github.com/AgriLife/af4-agrilife-org/blob/master/templates/single-exceptional-item.php
 * @since      0.1.0
 * @package    af4-agrilife-org
 * @subpackage af4-agrilife-org/templates
 */

add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_content', 'af4_ei_right_column', 1 );
add_action( 'genesis_entry_content', 'af4_ei_left_wrap', 2 );
add_action( 'genesis_entry_content', 'af4_ei_close_left_wrap', 11 );
add_action( 'genesis_entry_content', 'af4_ei_director_contact', 10 );
add_action( 'wp_enqueue_scripts', 'af4_ei_enqueue_agency_script', 13 );

/**
 * Provide content for the sidebar
 *
 * @since 0.1.0
 * @return void
 */
function af4_ei_right_column() {

	$logos       = get_field( 'logos' );
	$logo_output = '';

	if ( $logos && ! empty( $logos[0]['image'] ) ) {

		$logo_output .= '<div class="logos">';

		foreach ( $logos as $value ) {

			$value        = $value['image'];
			$srcset       = wp_get_attachment_image_srcset( $value['ID'] ) || 'srcset';
			$image        = wp_get_attachment_image( $value['ID'], 'full', false, $srcset );
			$logo_output .= sprintf(
				'<span class="%s">%s</span>',
				$value['name'],
				$image
			);

		}

		$logo_output .= '</div>';
	}

	$request_fields = get_field( 'request' );
	$request_year   = sanitize_text_field( $request_fields['year'] );
	$request_amount = sanitize_text_field( $request_fields['amount'] );

	$pdf_field = get_field( 'pdf' );
	$pdf_link  = $pdf_field['file'];
	$link      = sprintf(
		'<a href="%s" title="%s">',
		$pdf_link['url'],
		$pdf_link['title']
	);
	$pdf_thumb = $pdf_field['thumbnail'];
	$thumb_id  = $pdf_thumb['ID'];
	$srcset    = wp_get_attachment_image_srcset( $thumb_id ) || 'srcset';
	$image     = wp_get_attachment_image( $thumb_id, 'full', false, $srcset );
	$pdf       = sprintf(
		'%s%s<span>Print-Friendly PDF</span></a>',
		$link,
		$image
	);

	?><div class="right" data-sticky-container><div class="wrap" data-sticky data-anchor="left-column" data-margin-top="6">
			<?php echo wp_kses_post( $logo_output ); ?>
			<div class="text">
				<div class="request">
					<h3>Exceptional Item Request</h3>
					<h3>FY <?php echo esc_html( $request_year ); ?></h3>
					<div class="value"><?php echo esc_html( $request_amount ); ?></div>
				</div>
				<hr />
				<h3>Objective</h3>
				<p><?php echo wp_kses_post( $request_fields['objective'] ); ?></p>
			</div>
			<div class="pdf"><?php echo wp_kses_post( $pdf ); ?></div></div></div>
	<?php

}

/**
 * Add wrapper for main content area
 *
 * @since 0.1.0
 * @return void
 */
function af4_ei_left_wrap() {

	echo '<div id="left-column" class="left">';

}

/**
 * Close wrapper for main content area
 *
 * @since 0.1.0
 * @return void
 */
function af4_ei_close_left_wrap() {

	echo '</div>';

}

/**
 * Add director information
 *
 * @since 0.1.0
 * @return void
 */
function af4_ei_director_contact() {

	$director      = get_field( 'director' );
	$image_obj     = $director['image'];
	$image_id      = $image_obj['ID'];
	$image_sizes   = $image_obj['sizes'];
	$url           = wp_get_attachment_image_url( $image_id, 'medium_large' );
	$alt           = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	$director_desc = $director['description'];
	$contact_info  = get_field( 'contact_information' );
	$image         = "<img src=\"{$url}\" alt=\"{$alt}\">";

	echo sprintf(
		'<div class="contacts"><div class="item-director">%s%s</div><div class="contact"><h2>Contact</h2>%s</div></div>',
		wp_kses_post( $image ),
		wp_kses_post( $director_desc ),
		wp_kses_post( $contact_info )
	);

}

/**
 * Enqueue the javascript file
 *
 * @since 1.0.0
 * @return void
 */
function af4_ei_enqueue_agency_script() {
	wp_enqueue_script( 'af4-agrilife-org-single-agency' );
}

get_header();
genesis();
