<?php
/**
 * Template Name: Extension
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_action( 'wp_head', function(){
	?><link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"><?php
});
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){
	?><div class="content-heading-image"><img src="<?php echo ALAF4_DIR_URL; ?>images/extension-header-background.jpg">
		<h1><img src="<?php echo ALAF4_DIR_URL; ?>images/extension-header.png" alt="Texas A&M AgriLife Extension"></h1>
	</div>
	<div class="introduction layout-container"><p>The Texas A&M AgriLife Extension Service is an statewide education agency made up of professional educators, trained volunteers, and county offices. We address critical needs in every Texas county through Extension county offices. AgriLife Extension enables Texans to better their lives through various educational programs, activities and resources.</p>
		<p>All of our programs provide objective, practical and science-based information in conjunction with Texas A&M University’s College of Agriculture & Life Sciences.</p>
		<p>Some of our major efforts are:</p></div>
	<div class="flowchart">
		<div class="layout-container">
			<div class="flowchart-row top">
				<div class="al item">
					<a href="https://agrilife.org/" title="Texas A&M AgriLife Extension"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife-extension.png" alt="Texas A&M AgriLife Extension"></span></a>
				</div>
			</div>
			<div class="flowchart-row bottom"><div class="ext item"><img class="hide-for-small-only" src="<?php echo ALAF4_DIR_URL; ?>images/extension-cow-icon.png" alt="Cow"><p>Livestock and Crop protection</p></div><div class="res item"><img class="hide-for-small-only" src="<?php echo ALAF4_DIR_URL; ?>images/extension-water-icon.png" alt="Water"><p>Drought mitigation and water conservation</p></div><div class="college item"><img class="hide-for-small-only" src="<?php echo ALAF4_DIR_URL; ?>images/extension-apple-icon.png" alt="Apple"><p>Increasing food security practices</p></div><div class="tvmdl item"><img class="hide-for-small-only" src="<?php echo ALAF4_DIR_URL; ?>images/extension-heart-icon.png" alt="Heart"><p>Health and wellness education</p></div><div class="tfs item"><img class="hide-for-small-only" src="<?php echo ALAF4_DIR_URL; ?>images/extension-child-icon.png" alt="Child"><p>Youth Development</p></div></div>
		</div>
	</div>
	<div class="buttons"><a class="button">AGRILIFEEXTENSION.TAMU.EDU</a></div>
	<div class="exceptional-items">
		<div class="layout-container">
			<h2>Exceptional Items</h2>
			<div class="row"><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/flooding-cars.jpg" alt="Flooding"></div><div class="description">Improving Texas’ disaster
readiness means preparing local
jurisdictions for natural disaster
response and recovery.</div></div><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/mosquito.jpg" alt="Mosquito"></div><div class="description">Enhanced surveillance for
wildlife and zoonotic diseases
would help Texas officials
respond to, predict, and
prevent outbreaks.</div></div></div>
		</div>
	</div>
	<div class="director">
		<div class="layout-container"><div class="text-column"><div class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies vestibulum ornare. Morbi eget consequat augue. Pellentesque lacinia eget nibh ut dapibus. Mauris metus dui, pulvinar nec nibh id, suscipit aliquam dolor. </div><div class="creds">Dr. Parr Rosson, Interim Director
<p>Morbi eget consequat augue pellentesque<br>
Mauris metus dui, pulvinar nec nibh id suscipit<br>
Vestibulum nec interdum velit curabitur nec bibendum metus</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/extension-interim-director-parr-rosson.jpg" alt="Mosquito"></div></div>
	</div><div class="social-media-footer"><span class="item"><img src="<?php echo ALAF4_DIR_URL; ?>images/icon-facebook.png" alt="Facebook"></span><span class="item"><img src="<?php echo ALAF4_DIR_URL; ?>images/icon-twitter.png" alt="Twitter"></span><span class="item"><img src="<?php echo ALAF4_DIR_URL; ?>images/icon-instagram.png" alt="Instagram"></span><span class="item"><img src="<?php echo ALAF4_DIR_URL; ?>images/icon-linkedin.png" alt="LinkedIn"></span><span class="item"><img src="<?php echo ALAF4_DIR_URL; ?>images/icon-pinterest.png" alt="Pinterest"></span><span class="item"><img src="<?php echo ALAF4_DIR_URL; ?>images/icon-rss.png" alt="RSS"></span><span class="item"><img src="<?php echo ALAF4_DIR_URL; ?>images/icon-youtube.png" alt="YouTube"></span></div>
	<?php
});

genesis();
