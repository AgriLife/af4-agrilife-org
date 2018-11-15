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
		<h1>Agriculture and Life Sciences</h1>
	</div>
	<div class="introduction layout-container"><p>Agriculture and the life sciences has been an integral part of Texas A&M since 1876 when it was founded as the Agricultural and Mechanical College of Texas.  Naturally, with agriculture as one of the pillars on which Texas A&M University was established, the students we educate and the scientific advancements we discover are providing better nutrition and agriculture.</p><p>From long-established majors such as agronomy and animal science to newer programs such as forensics and spatial sciences, the College of Agriculture and Life Sciences is widely recognized as a leader in dozens of academic disciplines.</p></div>
	<div class="flowchart brackets">
		<div class="layout-container">
			<div class="flowchart-row top">
				<div class="al item">
					<a href="https://agrilife.org/" title="Texas A&M College of Agriculture and Life Sciences"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-college.png" alt="Texas A&M College of Agriculture and Life Sciences"></span></a>
				</div>
			</div>
			<div class="flowchart-row bottom"><div class="ext item"><p><span>Food &amp; Nutrition</span></p></div><div class="res item"><p><span>Disease Prevention</span></p></div><div class="college item"><p><span>Land Use</span></p></div><div class="tvmdl item"><p><span>Bioenergy</span></p></div><div class="tfs item"><p><span>Sustainability</span></p></div></div>
			<div class="flowchart-row bottom"><div class="ext item"><p><span>Pests &amp; Invasive Plants</span></p></div><div class="res item"><p><span>Insect-Vectored Diseases</span></p></div><div class="college item"><p><span>New crops</span></p></div><div class="tvmdl item"><p><span>Water</span></p></div><div class="tfs item"><p><span>Livestock & Plant Genetics</span></p></div></div>
		</div>
	</div>
	<div class="buttons"><a class="button" href="https://aglifesciences.tamu.edu/">aglifesciences.tamu.edu</a></div>
	<div class="exceptional-items">
		<div class="layout-container">
			<h2>Exceptional Items</h2>
			<div class="row"><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/fi-drone-cam.jpg" alt="Flooding"></div><h3>Connecting Texas Agriculture</h3><div class="description">Connecting food, health, and agriculture through a wide-ranging collaboration will fortify the Texas economy and improve Texans’ health and quality of life.</div></div><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/fi-oysters.jpg" alt="Mosquito"></div><h3>Innovating Texas Seafood Production</h3><div class="description">Innovating Texas seafood production will revive coastal waters, strengthen the seafood industry, and bolster the resilience of coastal communities.</div></div></div>
		</div>
	</div>
	<div class="director">
		<div class="layout-container"><div class="text-column"><div class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies vestibulum ornare. Morbi eget consequat augue. Pellentesque lacinia eget nibh ut dapibus. Mauris metus dui, pulvinar nec nibh id, suscipit aliquam dolor. </div><div class="creds">Patrick J. Stover, Vice Chancellor and Dean
<p>Morbi eget consequat augue pellentesque<br>
Mauris metus dui, pulvinar nec nibh id suscipit<br>
Vestibulum nec interdum velit curabitur nec bibendum metus</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/research-director.jpg" alt="Mosquito"></div></div>
	</div>
	<?php
});

genesis();
