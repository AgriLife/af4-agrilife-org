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
		<h1>Forest Service</h1>
	</div>
	<div class="introduction layout-container"><p>Texas A&M Forest Service (TFS) is the leader in forestry for Texas and the nation. TFS works to ensure the state’s forests, trees, and related natural resources are conserved and continue to provide a sustainable flow of environmental and economic benefits. Applied programs include:</p></div>
	<div class="flowchart brackets">
		<div class="layout-container">
			<div class="flowchart-row top">
				<div class="al item">
					<a href="https://agrilife.org/" title="Texas A&M AgriLife research"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife-research.png" alt="Texas A&M AgriLife research"></span></a>
				</div>
			</div>
			<div class="flowchart-row bottom"><div class="item"><p><span>Forest and tree development</span></p></div><div class="item"><p><span>Wildfire prevention</span></p></div><div class="item"><p><span>Mitigation and protection</span></p></div><div class="item"><p><span>Urban and community forestry</span></p></div><div class="item"><p><span>Forest sustainability programs</span></p></div></div>
			<div class="flowchart-row top count-3">
				<div class="al item h5">TFS is also the incident management agency for state disasters such as</div>
			</div>
			<div class="flowchart-row bottom count-3"><div class="item"><p><span>Wildfires</span></p></div><div class="item"><p><span>Flooding</span></p></div><div class="item"><p><span>Hurricanes</span></p></div></div>
		</div>
	</div>
	<div class="buttons"><a class="button" href="https://texasforestservice.tamu.edu/">texasforestservice.tamu.edu</a></div>
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
