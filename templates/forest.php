<?php
/**
 * Template Name: Research
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){
	?><div class="content-heading-image"><img class="background" src="<?php echo ALAF4_DIR_URL; ?>images/forest-header-background.jpg" srcset="<?php echo ALAF4_DIR_URL; ?>images/forest-header-background-640.jpg 640w, <?php echo ALAF4_DIR_URL; ?>images/forest-header-background-1024.jpg 1024w, <?php echo ALAF4_DIR_URL; ?>images/forest-header-background-1200.jpg 1200w, <?php echo ALAF4_DIR_URL; ?>images/forest-header-background-1440.jpg 1440w, <?php echo ALAF4_DIR_URL; ?>images/forest-header-background.jpg 1900w" sizes="(max-width: 640px) 640px, (max-width: 1024px) 1024px, (max-width: 1200px) 1200px, (max-width: 1440px) 1440px, 1900px">
		<h1>Forest Service</h1>
	</div>
	<div class="introduction layout-container"><p>Texas A&M Forest Service (TFS) is the leader in forestry for Texas and the nation. TFS works to ensure the state’s forests, trees, and related natural resources are conserved and continue to provide a sustainable flow of environmental and economic benefits. Applied programs include:</p></div>
	<div class="flowchart brackets">
		<div class="layout-container">
			<div class="flowchart-row top">
				<div class="al item">
					<a href="https://agrilife.org/" title="Texas A&M Forest Service"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-forest-service.png" alt="Texas A&M Forest Service"></span></a>
				</div>
			</div>
			<div class="flowchart-row bottom"><div class="item"><p><span>Forest and tree development</span></p></div><div class="item"><p><span>Wildfire prevention</span></p></div><div class="item"><p><span>Mitigation and protection</span></p></div><div class="item"><p><span>Urban and community forestry</span></p></div><div class="item"><p><span>Forest sustainability programs</span></p></div></div>
			<div class="flowchart-row top count-3">
				<div class="al item h5">TFS is also the incident management agency for state disasters such as</div>
			</div>
			<div class="flowchart-row bottom count-3"><div class="item"><p><span>Wildfires</span></p></div><div class="item"><p><span>Flooding</span></p></div><div class="item"><p><span>Hurricanes</span></p></div></div>
			<div class="flowchart-row text"><p>TFS delivers wildﬁre response and protection through the Texas Wildﬁre Protection Plan (TWPP). TWPP is a tested and proven emergency response model emphasizing ongoing analysis, mitigation, prevention, and preparation followed by a coordinated and rapid response. With legislative support, TFS is working to expand the plan, increasing the number of personnel and emergency response resources throughout the state.</p></div>
		</div>
	</div>
	<div class="buttons"><a class="button" href="https://texasforestservice.tamu.edu/">texasforestservice.tamu.edu</a></div>
	<div class="exceptional-items">
		<div class="layout-container">
			<h2>Exceptional Items</h2>
			<div class="row"><div class="text">Numerous emergency response operations use Texas Wildﬁre Protection Plan–Texas Intrastate Fire Mutual Aid System (TIFMAS) grants, which require additional funding.</div></div>
		</div>
	</div>
	<div class="director">
		<div class="layout-container"><div class="text-column"><div class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies vestibulum ornare. Morbi eget consequat augue. Pellentesque lacinia eget nibh ut dapibus. Mauris metus dui, pulvinar nec nibh id, suscipit aliquam dolor. </div><div class="creds">Tom G. Boggus, Director
<p>Morbi eget consequat augue pellentesque<br>
Mauris metus dui, pulvinar nec nibh id suscipit<br>
Vestibulum nec interdum velit curabitur nec bibendum metus</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/director-forest.jpg"></div></div>
	</div>
	<?php
});

genesis();
