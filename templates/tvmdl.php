<?php
/**
 * Template Name: Research
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){
	?><div class="content-heading-image"><img class="background" src="<?php echo ALAF4_DIR_URL; ?>images/tvmdl-header-background.jpg" srcset="<?php echo ALAF4_DIR_URL; ?>images/tvmdl-header-background-1024.jpg 1024w, <?php echo ALAF4_DIR_URL; ?>images/tvmdl-header-background-1200.jpg 1200w, <?php echo ALAF4_DIR_URL; ?>images/tvmdl-header-background-1440.jpg 1440w, <?php echo ALAF4_DIR_URL; ?>images/tvmdl-header-background.jpg 1900w" sizes="(max-width: 1024px) 1024px, (max-width: 1200px) 1200px, (max-width: 1440px) 1440px, 1900px">
		<h1>TVMDL</h1>
	</div>
	<div class="introduction layout-container"><p>Texas A&M Veterinary Medical Diagnostic Laboratory (TVMDL) tests hundreds of specimens from clients across Texas, in neighboring states, and around the world every business day, contributing signiﬁcantly to protecting the health of livestock, poultry, companion animals, exotic animals, racing animals, and wildlife.</p><p>Veterinarians, animal owners, animal industries, and government agencies depend on TVMDL’s globally recognized expertise for early detection and control of diseases. Accredited by the American Association of Veterinary Laboratory Diagnosticians, TVMDL is among the 12 core laboratories in the National Animal Health Laboratory Network, designed to provide a nationwide surge-testing, response, and recovery capacity in the event of an animal disease outbreak. TVMDL played a critical role in recognizing and containing outbreaks of anthrax, avian inﬂuenza, and equine piroplasmosis.</p></div>
	<div class="flowchart brackets">
		<div class="layout-container">
			<div class="flowchart-row top">
				<div class="al item">
					<a href="https://tvmdl.tamu.edu/" title="Texas A&M Veterinary Medical Diagnostic Laboratory"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-tvmdl.png" alt="Texas A&M Veterinary Medical Diagnostic Laboratory"></span></a>
				</div>
			</div>
			<div class="flowchart-row bottom"><div class="item"><p><span>Early Disease Detection</span></p></div><div class="item"><p><span>Result Interpretation</span></p></div><div class="item"><p><span>Racing Testing</span></p></div><div class="item"><p><span>Diagnostic Testing</span></p></div><div class="item"><p><span>Disease Outbreak Recovery</span></p></div></div>
		</div>
	</div>
	<div class="buttons"><a class="button" href="https://tvmdl.tamu.edu/">tvmdl.tamu.edu</a></div>
	<div class="exceptional-items">
		<div class="layout-container">
			<h2>Exceptional Items</h2>
			<div class="row"><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/microscope-tvmdl.jpg" alt="Students looking in microscopes"></div><h3>Connecting Texas Agriculture</h3><div class="description">Two poultry diagnostic laboratories enable the Texas poultry industry to operate, and they require base funding.</div></div><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/testing-samples.jpg" alt="A student testing samples"></div><h3>Innovating Texas Seafood Production</h3><div class="description">A top-notch biosurveillance and anti-bioterrorism laboratory is needed to protect Texans’ health, security, and ﬁnancial well-being.</div></div></div>
		</div>
	</div>
	<div class="director">
		<div class="layout-container"><div class="text-column"><div class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies vestibulum ornare. Morbi eget consequat augue. Pellentesque lacinia eget nibh ut dapibus. Mauris metus dui, pulvinar nec nibh id, suscipit aliquam dolor. </div><div class="creds">Bruce L. Akey, Director
<p>Morbi eget consequat augue pellentesque<br>
Mauris metus dui, pulvinar nec nibh id suscipit<br>
Vestibulum nec interdum velit curabitur nec bibendum metus</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/director-tvmdl.jpg" alt="Director Bruce L. Akey"></div></div>
	</div>
	<?php
});

genesis();
