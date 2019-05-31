<?php
/**
 * The file that renders the home page content
 *
 * A custom page template for Home
 *
 * @link       https://github.com/AgriLife/af4-agrilife-org/blob/master/templates/home.php
 * @since      0.1.0
 * @package    af4-agrilife-org
 * @subpackage af4-agrilife-org/templates
 */

/**
 * Template Name: Home
 */
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_post_title', 'genesis_do_post_title' );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
add_filter( 'safe_style_css', 'af4_add_safe_style' );

/**
 * Add safe styles for Item 5 form html in custom field.
 *
 * @since 0.6.7
 * @param array $styles Current list of safe styles.
 * @return array
 */
function af4_add_safe_style( $styles ) {
	$styles[] = 'position';
	$styles[] = 'left';
	$styles[] = 'display';
	return $styles;
}

add_action( 'genesis_entry_content', 'af4_home_content' );

/**
 * Provide content for the home page template.
 *
 * @since 0.1.0
 * @return void
 */
function af4_home_content() {

	$action_items = get_field( 'action_items' );

	echo '<div id="overview">';
	echo '<div id="leaders-heading" class="layout-container"><h1><span class="heading-1">Leaders </span><span class="heading-2-wrap"><span class="heading-2">in Agriculture, Natural Resources &amp;&nbsp;Life&nbsp;Sciences</span></span></h1></div>';
	echo '<div id="action-items" class="layout-container">';

	// Item 1.
	echo '<div class="item item-1"><div class="wrap"><h2>86th Legislature</h2><div class="description has-line"><ul><li><a href="/agency/extension-home/#ei"><span class="show-for-xlarge">Texas A&amp;M AgriLife </span>Extension<span class="show-for-medium"> Service</span></a></li><li><a href="/agency/research-home/#ei"><span class="show-for-xlarge">Texas A&amp;M AgriLife </span>Research</a></li><li><a href="/agency/tvmdl-home/#ei"><span class="show-for-xlarge">Texas A&amp;M </span>Veterinary<span class="hide-for-medium hide-for-large"> Medical</span> Diagnostic<span class="hide-for-xlarge">s</span><span class="show-for-xlarge"> Laboratory</span></a></li><li><a href="/agency/tfs-home/#ei"><span class="show-for-xlarge">Texas A&amp;M </span>Forest<span class="show-for-medium hide-for-large">ry</span> Service</a></li></ul></div></div></div>';

	// Item 2.
	$item_2  = $action_items['item_2'];
	$content = '';
	$img     = $item_2['image'];
	$heading = $item_2['heading'];
	$link    = $item_2['link'];

	if ( $link ) {
		if ( $img ) {
			$content = sprintf(
				'<a href="%s"><img class="hide-for-small-only" src="%s" alt="%s"><h2>%s</h2></a>',
				$link,
				$img['url'],
				$img['alt'],
				$heading
			);
		} else {
			$content = sprintf(
				'<a href="%s"><h2>%s</h2></a>',
				$link,
				$heading
			);
		}
	} else {
		if ( $img ) {
			$content = sprintf(
				'<img class="hide-for-small-only" src="%s" alt="%s"><h2>%s</h2>',
				$img['url'],
				$img['alt'],
				$heading
			);
		} else {
			$content = sprintf(
				'<h2>%s</h2>',
				$heading
			);
		}
	}

	echo sprintf(
		'<div class="item item-2">%s</div>',
		wp_kses_post( $content )
	);

	// Item 3.
	$item_3  = $action_items['item_3'];
	$wrap    = '';
	$img     = $item_3['image'];
	$heading = $item_3['heading'];
	$link    = $item_3['link'];
	$desc    = $item_3['description'];

	if ( $link ) {
		if ( $img ) {
			$wrap = sprintf(
				'<div class="wrap" style="background-image: url(%s);"><a href="%s"><img src="%s" alt=""><h2>%s</h2></a>',
				$img['url'],
				$link,
				$img['url'],
				$heading
			);
		} else {
			$wrap = sprintf(
				'<div class="wrap"><h2><a href="%s">%s</a></h2>',
				$link,
				$heading
			);
		}
	} else {
		if ( $img ) {
			$wrap = sprintf(
				'<div class="wrap" style="background-image: url(%s);"><img src="%s" alt=""><h2>%s</h2>',
				$img['url'],
				$img['url'],
				$heading
			);
		} else {
			$wrap = sprintf(
				'<div class="wrap"><h2>%s</h2>',
				$heading
			);
		}
	}

	echo sprintf(
		'<div class="item item-3 featured">%s<div class="description has-line hide-for-small-only">%s</div></div></div>',
		wp_kses_post( $wrap ),
		wp_kses_post( $desc )
	);

	// Item 4.
	$item_4     = $action_items['item_4'];
	$img        = $item_4['image'];
	$link       = $item_4['link'];
	$desc       = $item_4['description'];
	$link_open  = '';
	$link_close = '';

	if ( $link ) {
		$link_open  = "<a href=\"{$link}\">";
		$link_close = '</a>';
	}

	echo sprintf(
		'<div class="item item-4"><div class="wrap">%s<img src="%s"><h2>AgriLife Today</h2><div class="description has-line hide-for-small-only">%s</div>%s</div></div>',
		wp_kses_post( $link_open ),
		esc_url( $img['url'] ),
		wp_kses_post( $desc ),
		wp_kses_post( $link_close )
	);

	// Item 5.
	$item_5       = $action_items['item_5'];
	$link         = $item_5['link'];
	$heading      = $item_5['heading'];
	$form         = preg_replace( '/<(\/)?p>/', '', $item_5['form'] );
	$link_open    = '';
	$link_close   = '';
	$allowed_html = array(
		'script' => array(
			'type' => array(),
			'src'  => array(),
		),
		'div'    => array(
			'id'          => array(),
			'class'       => array(),
			'for'         => array(),
			'style'       => array(
				'position' => 'absolute',
			),
			'aria-hidden' => array(),
		),
		'form'   => array(
			'action'     => array(),
			'method'     => array(),
			'id'         => array(),
			'class'      => array(),
			'name'       => array(),
			'target'     => array(),
			'novalidate' => array(),
		),
		'label'  => array(
			'for'   => array(),
			'class' => array(),
		),
		'input'  => array(
			'type'        => array(),
			'value'       => array(),
			'placeholder' => array(),
			'name'        => array(),
			'class'       => array(),
			'id'          => array(),
			'tabindex'    => array(),
		),
	);

	if ( $link ) {
		$link_open  = "<a href=\"{$link}\">";
		$link_close = '</a>';
	}

	echo sprintf(
		'<div class="item item-5"><div class="wrap"><h2><span class="big">Newsletter</span></h2><h3>%s%s%s</h3>%s</div></div>',
		wp_kses_post( $link_open ),
		esc_html( $heading ),
		wp_kses_post( $link_close ),
		wp_kses( $form, $allowed_html )
	);

	echo '</div></div>';

	$agencies  = '<div class="flowchart-row top"><a href="https://agrilife.org/" title="Texas A&M AgriLife"><div class="al item"><span><img src="%s/agrilife-white.png" alt="Texas A&M AgriLife"></span></a></div></div>';
	$agencies .= '<div class="flowchart-row bottom"><a href="/agency/extension-home/" title="Texas A&M AgriLife Extension Service"><div class="ext item"><span><img class="hide-for-small-only" src="%s/extension-white.png" alt="Texas A&M AgriLife Extension Service"><span class="show-for-small-only">Texas A&amp;M AgriLife Extension</span></span></a></div><div class="res item"><a href="/agency/research-home/" title="Texas A&M AgriLife Research"><span><img class="hide-for-small-only" src="%s/research-white.png" alt="Texas A&M AgriLife Research"><span class="show-for-small-only">Texas A&amp;M AgriLife Research</span></span></a></div><div class="college item"><a href="/agency/college-home/" title="Texas A&M College of Agrculture and Life Sciences"><span><img class="hide-for-small-only" src="%s/coals-white-stacked.png" alt="Texas A&M College of Agrculture and Life Sciences"><span class="show-for-small-only">Texas A&amp;M University College of Agriculture &amp; Life Sciences</span></span></a></div><div class="tvmdl item"><a href="/agency/tvmdl-home/" title="Texas A&M Veterinary Medical Diagnostics Laboratory"><span><img class="hide-for-small-only" src="%s/tvmdl-white.png" alt="Texas A&M Veterinary Medical Diagnostics Laboratory"><span class="show-for-small-only">Texas A&amp;M Veterinary Medical Diagnostic Laboratory</span></span></a></div><div class="tfs item"><a href="/agency/tfs-home/" title="Texas A&M Forest Service"><span><img class="hide-for-small-only" src="%s/forest-white.png" alt="Texas A&M Forest Service"><span class="show-for-small-only">Texas A&amp;M Forest Service</span></span></a></div></div>';
	$agencies  = str_replace( '%s', AF_THEME_DIRURL . '/images/logos', $agencies );

	echo sprintf(
		'<div id="agencies" class="flowchart no-arrow"><div class="layout-container">%s</div></div>',
		wp_kses_post( $agencies )
	);
}

genesis();
