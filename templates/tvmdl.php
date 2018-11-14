<?php
/**
 * Template Name: Research
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){
	?><div class="content-heading-image"><img class="background show-for-small-only" src="<?php echo ALAF4_DIR_URL; ?>images/research-header-background-640.jpg"><img class="background show-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/research-header-background.jpg" srcset="<?php echo ALAF4_DIR_URL; ?>images/research-header-background-1024.jpg 1024w, <?php echo ALAF4_DIR_URL; ?>images/research-header-background-1200.jpg 1200w, <?php echo ALAF4_DIR_URL; ?>images/research-header-background-1440.jpg 1440w, <?php echo ALAF4_DIR_URL; ?>images/research-header-background.jpg 1900w" sizes="(max-width: 1024px) 1024px, (max-width: 1200px) 1200px, (max-width: 1440px) 1440px, 1900px">
		<h1><img src="<?php echo ALAF4_DIR_URL; ?>images/research-header.png" alt="Texas A&M AgriLife Research"></h1>
	</div>
	<div class="introduction layout-container"><p>Texas A&M AgriLife Research is the leading research and technology development agency in Texas. We conduct more than 500 agriculture, natural resources, and the life sciences projects each year supported with more than $206.9 million in research funding in 2016. We have a statewide presence and collaborate with scientists and research staff on other Texas A&M University System campuses and at the 13 regional Texas A&M AgriLife Research and research Centers. Our scientists span many disciplines uniting with other centers and entities improve in the following fields:</p></div>
	<div class="flowchart">
		<div class="layout-container">
			<div class="flowchart-row top">
				<div class="al item">
					<a href="https://agrilife.org/" title="Texas A&M AgriLife research"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife-research.png" alt="Texas A&M AgriLife research"></span></a>
				</div>
			</div>
			<div class="flowchart-row bottom"><div class="ext item"><p><span>Food &amp; Nutrition</span></p></div><div class="res item"><p><span>Disease Prevention</span></p></div><div class="college item"><p><span>Land Use</span></p></div><div class="tvmdl item"><p><span>Bioenergy</span></p></div><div class="tfs item"><p><span>Sustainability</span></p></div></div>
			<div class="flowchart-row bottom"><div class="ext item"><p><span>Pests &amp; Invasive Plants</span></p></div><div class="res item"><p><span>Insect-Vectored Diseases</span></p></div><div class="college item"><p><span>New crops</span></p></div><div class="tvmdl item"><p><span>Water</span></p></div><div class="tfs item"><p><span>Livestock & Plant Genetics</span></p></div></div>
		</div>
	</div>
	<div class="buttons"><a class="button" href="https://agriliferesearch.tamu.edu/">agriliferesearch.tamu.edu</a></div>
	<div class="exceptional-items">
		<div class="layout-container">
			<h2>Exceptional Items</h2>
			<div class="row"><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/fi-drone-cam.jpg" alt="Flooding"></div><h3>Connecting Texas Agriculture</h3><div class="description">Connecting food, health, and agriculture through a wide-ranging collaboration will fortify the Texas economy and improve Texans’ health and quality of life.</div></div><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/fi-oysters.jpg" alt="Mosquito"></div><h3>Innovating Texas Seafood Production</h3><div class="description">Innovating Texas seafood production will revive coastal waters, strengthen the seafood industry, and bolster the resilience of coastal communities.</div></div></div>
		</div>
	</div>
	<div class="director">
		<div class="layout-container"><div class="text-column"><div class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies vestibulum ornare. Morbi eget consequat augue. Pellentesque lacinia eget nibh ut dapibus. Mauris metus dui, pulvinar nec nibh id, suscipit aliquam dolor. </div><div class="creds">Dr. Parr Rosson, Interim Director
<p>Morbi eget consequat augue pellentesque<br>
Mauris metus dui, pulvinar nec nibh id suscipit<br>
Vestibulum nec interdum velit curabitur nec bibendum metus</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/research-director.jpg" alt="Mosquito"></div></div>
	</div>
	<?php
});

genesis();
