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
	?><div id="overview">
		<div id="leaders-heading" class="layout-container"><h1><span class="heading-1">Leaders in </span><span class="heading-2">Agriculture,<br> Natural Resources,<br> &amp; Life Sciences</span></h1></div>
		<div id="action-items" class="layout-container">
			<div class="item"><h2>Exceptional Items</h2>
				<div class="description hide-for-small-only"><ul><li>Texas A&M AgriLife Extension</li>
				<li>Texas A&M AgriLife Research</li>
				<li>Texas A&M Veterinary Medical Diagnostic Laboratory</li>
				<li>Texas A&M Forest Service</li></ul></div>
			</div>
			<div class="item"><img class="hide-for-small-only" src="<?php echo ALAF4_DIR_URL; ?>/images/home-about.jpg" alt=""><h2>What is <br>Texas A&M AgriLife?</h2></div>
			<div class="item featured"><div class="wrap" style="background-image: url(<?php echo ALAF4_DIR_URL; ?>/images/home-impacts.jpg);"><img src="<?php echo ALAF4_DIR_URL; ?>/images/home-impacts.jpg" alt=""><h2>Impacts</h2>
				<div class="description hide-for-small-only">Residents, AgriLife Extension, others work to 'Harvey-proof' Houston-area community</div>
			</div></div>
			<div class="item"><img class="hide-for-small-only" src="<?php echo ALAF4_DIR_URL; ?>/images/home-today.jpg" alt=""><h2>AgriLife Today</h2>
				<div class="description hide-for-small-only">Texas A&M AgriLife to lead consortium in establishing Center
			</div></div>
			<div class="item"><h2>Vice Chancellor's Newsletter</h2></div>
		</div>
	</div>
	<div id="agencies">
		<div class="layout-container">
			<div class="agency-row top"><div class="al item"><a href="https://agrilife.org/" title="Texas A&M AgriLife"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife.png" alt="Texas A&M AgriLife"></span></a></div></div>
			<div class="agency-row bottom"><div class="ext item"><a href="http://agrilifeextension.tamu.edu/" title="Texas A&M AgriLife Extension Service"><span><img class="hide-for-small-only" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife-extension.png" alt="Texas A&M AgriLife Extension Service"><span class="show-for-small-only">Texas A&amp;M AgriLife Extension</span></span></a></div><div class="res item"><a href="http://agriliferesearch.tamu.edu/" title="Texas A&M AgriLife Research"><span><img class="hide-for-small-only" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife-research.png" alt="Texas A&M AgriLife Research"><span class="show-for-small-only">Texas A&amp;M AgriLife Research</span></span></a></div><div class="college item"><a href="http://aglifesciences.tamu.edu/" title="Texas A&M College of Agrculture and Life Sciences"><span><img class="hide-for-small-only" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-coals.png" alt="Texas A&M College of Agrculture and Life Sciences"><span class="show-for-small-only">Texas A&amp;M University College of Agriculture &amp; Life Sciences</span></span></a></div><div class="tvmdl item"><a href="http://tvmdl.tamu.edu/" title="Texas A&M Veterinary Medical Diagnostics Laboratory"><span><img class="hide-for-small-only" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-tvmdl.png" alt="Texas A&M Veterinary Medical Diagnostics Laboratory"><span class="show-for-small-only">Texas A&amp;M Veterinary Medical Diagnostic Laboratory</span></span></a></div><div class="tfs item"><a href="http://texasforestservice.tamu.edu/" title="Texas A&M Forest Service"><span><img class="hide-for-small-only" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-forest-service.png" alt="Texas A&M Forest Service"><span class="show-for-small-only">Texas A&amp;M Forest Service</span></span></a></div></div>
		</div>
	</div>
	<?php
});

genesis();
