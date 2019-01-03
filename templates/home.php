<?php
/**
 * Template Name: Home
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_action( 'wp_head', function(){
	?><link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"><?php
});
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){

	$action_items = get_field('action_items');

	?><div id="overview">
		<div id="leaders-heading" class="layout-container"><h1><span class="heading-1">Leaders in </span><span class="heading-2">Agriculture,<br> Natural Resources,<br> &amp; Life Sciences</span></h1></div>
		<div id="action-items" class="layout-container">
			<div class="item item-1"><div class="wrap"><h2>86th Legislature</h2>
				<div class="description has-line">
					<ul>
						<li><a href="/agency/extension-home/#ei"><span class="show-for-xlarge">Texas A&amp;M AgriLife </span>Extension<span class="show-for-medium"> Service</span></a></li>
						<li><a href="/agency/research-home/#ei"><span class="show-for-xlarge">Texas A&amp;M AgriLife </span>Research</a></li>
						<li><a href="/agency/tvmdl-home/#ei"><span class="show-for-xlarge">Texas A&amp;M </span>Veterinary<span class="hide-for-medium hide-for-large"> Medical</span> Diagnostic<span class="hide-for-xlarge">s</span><span class="show-for-xlarge"> Laboratory</span></a></li>
						<li><a href="/agency/tfs-home/#ei"><span class="show-for-xlarge">Texas A&amp;M </span>Forest<span class="show-for-medium hide-for-large">ry</span> Service</a></li>
					</ul></div></div>
			</div>
			<div class="item item-2"><a href="/about/"><img class="hide-for-small-only" src="<?php echo ALAF4_DIR_URL; ?>/images/home-about.jpg" alt="About AgriLife"></a><h2><a href="/about/">What is <br>Texas A&amp;M AgriLife?</a></h2></div>
			<div class="item item-3 featured"><?php

				$item_3 = $action_items['item_3'];
				$img = $item_3['image'];
				$heading = $item_3['heading'];
				$link = $item_3['link'];
				$desc = $item_3['description'];

				if( $link ){
					if( $img ){
						echo sprintf( '<div class="wrap" style="background-image: url(%s);"><a href="%s"><img src="%s" alt=""><h2>%s</h2></a>',
							$img['url'],
							$link,
							$img['url'],
							$heading
						);
					} else {
						echo sprintf( '<div class="wrap"><h2><a href="%s">%s</a></h2>',
							$link,
							$heading
						);
					}
				} else {
					if( $img ){
						echo sprintf( '<div class="wrap" style="background-image: url(%s);"><img src="%s" alt=""><h2>%s</h2>',
							$img['url'],
							$img['url'],
							$heading
						);
					} else {
						echo sprintf( '<div class="wrap"><h2>%s</h2>',
							$heading
						);
					}
				}

				echo "<div class=\"description has-line hide-for-small-only\">{$desc}</div></div>";

			?></div>
			<div class="item item-4"><div class="wrap"><?php

				$item_4 = $action_items['item_4'];
				$img = $item_4['image'];
				$link = $item_4['link'];
				$desc = $item_4['description'];

				$link_open = '';
				$link_close = '';

				if( $link ){
					$link_open = "<a href=\"{$link}\">";
					$link_close = '</a>';
				}

				echo sprintf( '%s<img src="%s"><h2>AgriLife Today</h2>%s<div class="description has-line hide-for-small-only">%s</div>',
					$link_open,
					$img['url'],
					$link_close,
					$desc
				);

			?></div></div>
			<div class="item item-5">
				<div class="wrap">
					<h2><span class="big">Newsletter</span></h2>
					<?php

						$item_5 = $action_items['item_5'];
						$link = $item_5['link'];
						$heading = $item_5['heading'];
						$form = preg_replace('/<(\/)?p>/', '', $item_5['form']);
						$link_open = '';
						$link_close = '';

						if( $link ){
							$link_open = "<a href=\"{$link}\">";
							$link_close = '</a>';
						}

						echo "<h3>{$link_open}{$heading}{$link_close}</h3>{$form}";

					?>
				</div>
			</div>
		</div>
	</div>
	<div id="agencies" class="flowchart no-arrow">
		<div class="layout-container">
			<div class="flowchart-row top"><a href="https://agrilife.org/" title="Texas A&M AgriLife"><div class="al item"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife.png" alt="Texas A&M AgriLife"></span></a></div></div><div class="flowchart-row bottom"><a href="/agency/extension-home/" title="Texas A&M AgriLife Extension Service"><div class="ext item"><span><img class="hide-for-small-only" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife-extension.png" alt="Texas A&M AgriLife Extension Service"><span class="show-for-small-only">Texas A&amp;M AgriLife Extension</span></span></a></div><div class="res item"><a href="/agency/research-home/" title="Texas A&M AgriLife Research"><span><img class="hide-for-small-only" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife-research.png" alt="Texas A&M AgriLife Research"><span class="show-for-small-only">Texas A&amp;M AgriLife Research</span></span></a></div><div class="college item"><a href="/agency/college-home/" title="Texas A&M College of Agrculture and Life Sciences"><span><img class="hide-for-small-only" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-coals-vertical-white-small.png" alt="Texas A&M College of Agrculture and Life Sciences"><span class="show-for-small-only">Texas A&amp;M University College of Agriculture &amp; Life Sciences</span></span></a></div><div class="tvmdl item"><a href="/agency/tvmdl-home/" title="Texas A&M Veterinary Medical Diagnostics Laboratory"><span><img class="hide-for-small-only" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-tvmdl.png" alt="Texas A&M Veterinary Medical Diagnostics Laboratory"><span class="show-for-small-only">Texas A&amp;M Veterinary Medical Diagnostic Laboratory</span></span></a></div><div class="tfs item"><a href="/agency/tfs-home/" title="Texas A&M Forest Service"><span><img class="hide-for-small-only" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-forest-service.png" alt="Texas A&M Forest Service"><span class="show-for-small-only">Texas A&amp;M Forest Service</span></span></a></div></div>
		</div>
	</div>
	<?php
});

genesis();
