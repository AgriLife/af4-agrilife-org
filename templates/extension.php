<?php
/**
 * Template Name: Extension
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){
	?><div class="content-heading-image"><img class="background" src="<?php echo ALAF4_DIR_URL; ?>images/extension-header-background.jpg" srcset="<?php echo ALAF4_DIR_URL; ?>images/extension-header-background-640.jpg 640w, <?php echo ALAF4_DIR_URL; ?>images/extension-header-background-1024.jpg 1024w, <?php echo ALAF4_DIR_URL; ?>images/extension-header-background-1200.jpg 1200w, <?php echo ALAF4_DIR_URL; ?>images/extension-header-background-1440.jpg 1440w, <?php echo ALAF4_DIR_URL; ?>images/extension-header-background.jpg 1900w" sizes="(max-width: 640px) 640px, (max-width: 1024px) 1024px, (max-width: 1200px) 1200px, (max-width: 1440px) 1440px, 1900px">
		<h1>Extension</h1>
	</div>
	<div class="introduction layout-container"><p>The Texas A&M AgriLife Extension Service is an statewide education agency made up of professional educators, trained volunteers, and county offices. We address critical needs in every Texas county through Extension county offices. AgriLife Extension enables Texans to better their lives through various educational programs, activities and resources.</p>
		<p>All of our programs provide objective, practical and science-based information in conjunction with Texas A&M University’s College of Agriculture & Life Sciences.</p>
		<p>Some of our major efforts are:</p></div>
	<div class="flowchart brackets">
		<div class="layout-container">
			<div class="flowchart-row top">
				<div class="al item">
					<a href="https://agrilife.org/" title="Texas A&M AgriLife Extension"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife-extension.png" alt="Texas A&M AgriLife Extension"></span></a>
				</div>
			</div>
			<div class="flowchart-row bottom"><div class="ext item"><p><span>Livestock and Crop protection</span></p></div><div class="res item"><p><span>Drought mitigation and water conservation</span></p></div><div class="college item"><p><span>Increasing food security practices</span></p></div><div class="tvmdl item"><p><span>Health and wellness education</span></p></div><div class="tfs item"><p><span>Youth Development</span></p></div></div>
		</div>
	</div>
	<div class="buttons"><a class="button" href="https://agrilifeextension.tamu.edu/">AGRILIFEEXTENSION.TAMU.EDU</a></div>
	<div class="exceptional-items">
		<div class="layout-container">
			<h2>Exceptional Items</h2>
			<div class="row"><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/flooding-cars.jpg" alt="Flooding"></div><h3>Disaster readiness and recovery</h3><div class="description">Improving Texas’ disaster readiness means preparing local jurisdictions for natural disaster response and recovery.</div></div><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/mosquito.jpg" alt="Mosquito"></div><h3>Wildlife and zoonotic disease</h3><div class="description">Enhanced surveillance for wildlife and zoonotic diseases would help Texas officials respond to, predict, and prevent outbreaks.</div></div></div>
		</div>
	</div>
	<div class="director">
		<div class="layout-container"><div class="text-column"><div class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies vestibulum ornare. Morbi eget consequat augue. Pellentesque lacinia eget nibh ut dapibus. Mauris metus dui, pulvinar nec nibh id, suscipit aliquam dolor. </div><div class="creds">Dr. Parr Rosson, Interim Director
<p>Morbi eget consequat augue pellentesque<br>
Mauris metus dui, pulvinar nec nibh id suscipit<br>
Vestibulum nec interdum velit curabitur nec bibendum metus</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/extension-director.jpg" alt="Mosquito"></div></div>
	</div>
	<?php
});

genesis();
