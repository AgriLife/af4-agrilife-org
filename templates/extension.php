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
	?><div class="content-heading-image"><img class="background show-for-small-only" src="<?php echo ALAF4_DIR_URL; ?>images/extension-header-background-640.jpg"><img class="background show-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/extension-header-background.jpg" srcset="<?php echo ALAF4_DIR_URL; ?>images/extension-header-background-1024.jpg 1024w, <?php echo ALAF4_DIR_URL; ?>images/extension-header-background-1200.jpg 1200w, <?php echo ALAF4_DIR_URL; ?>images/extension-header-background-1440.jpg 1440w, <?php echo ALAF4_DIR_URL; ?>images/extension-header-background.jpg 1900w" sizes="(max-width: 1024px) 1024px, (max-width: 1200px) 1200px, (max-width: 1440px) 1440px, 1900px">
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
			<div class="flowchart-row bottom"><div class="ext item"><span class="img-wrap"><img src="<?php echo ALAF4_DIR_URL; ?>images/extension-cow-icon.png" alt="Cow"></span><p>Livestock and Crop protection</p></div><div class="res item"><span class="img-wrap"><img src="<?php echo ALAF4_DIR_URL; ?>images/extension-water-icon.png" alt="Water"></span><p>Drought mitigation and water conservation</p></div><div class="college item"><span class="img-wrap"><img src="<?php echo ALAF4_DIR_URL; ?>images/extension-apple-icon.png" alt="Apple"></span><p>Increasing food security practices</p></div><div class="tvmdl item"><span class="img-wrap"><img src="<?php echo ALAF4_DIR_URL; ?>images/extension-heart-icon.png" alt="Heart"></span><p>Health and wellness education</p></div><div class="tfs item"><span class="img-wrap"><img src="<?php echo ALAF4_DIR_URL; ?>images/extension-child-icon.png" alt="Child"></span><p>Youth Development</p></div></div>
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
	</div>
	<?php
});

genesis();
