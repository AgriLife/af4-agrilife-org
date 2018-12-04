<?php
/**
 * Template Name: Research
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){
	?><div class="content-heading-image">
		<div class="wrap">
			<img class="background hide-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/tvmdl-header-small-640.jpg"<?php

				$widths = array(640, 720, 800, 880, 960, 1040, 1280);
				$srcset = array();
				$sizes = array();
				$len = count($widths);

				foreach ($widths as $key => $value) {
					$srcset[] = sprintf(ALAF4_DIR_URL . 'images/tvmdl-header-small-%s.jpg %sw', $value, $value);
					if ($key !== $len) {
						$sizes[] = sprintf('(max-width: %spx) %spx', $value, $value);
					} else {
						$sizes[] = sprintf('%spx', $value);
					}
				}

				echo sprintf(' srcset="%s" sizes="%s"',
					implode(', ', $srcset),
					implode(', ', $sizes)
				);

			?>><img class="background show-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/tvmdl-header-background-1900.jpg"<?php

				$widths = array(1024, 1200, 1440, 1900);
				$srcset = array();
				$sizes = array();
				$len = count($widths);

				foreach ($widths as $key => $value) {
					$srcset[] = sprintf(ALAF4_DIR_URL . 'images/tvmdl-header-background-%s.jpg %sw', $value, $value);
					if ($key !== $len) {
						$sizes[] = sprintf('(max-width: %spx) %spx', $value, $value);
					} else {
						$sizes[] = sprintf('%spx', $value);
					}
				}

				echo sprintf(' srcset="%s" sizes="%s"',
					implode(', ', $srcset),
					implode(', ', $sizes)
				);

			?>>
			<h1>TVMDL</h1>
		</div>
	</div>
	<div class="introduction layout-container"><p><a href="http://tvmdl.tamu.edu/">Texas A&M Veterinary Medical Diagnostic Laboratory (TVMDL)</a> tests hundreds of specimens from clients across Texas, in neighboring states, and around the world every business day, contributing signiﬁcantly to protecting the health of livestock, poultry, companion animals, exotic animals, racing animals, and wildlife.</p><p>Veterinarians, animal owners, animal industries, and government agencies depend on TVMDL’s globally recognized expertise for early detection and control of diseases. Accredited by the American Association of Veterinary Laboratory Diagnosticians, TVMDL is among the 12 core laboratories in the National Animal Health Laboratory Network, designed to provide a nationwide surge-testing, response, and recovery capacity in the event of an animal disease outbreak. TVMDL played a critical role in recognizing and containing outbreaks of anthrax, avian inﬂuenza, and equine piroplasmosis.</p></div>
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
			<div class="row"><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/microscope-tvmdl.jpg" alt="Students looking in microscopes"></div><h3>Developing Biosurveillance &amp; Anti-Bioterrorism Capacity</h3><div class="description">Two poultry diagnostic laboratories enable the Texas poultry industry to operate, and they require base funding.</div></div><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/testing-samples.jpg" alt="A student testing samples"></div><h3>Funding Poultry Diagnostic Laboratories</h3><div class="description">A top-notch biosurveillance and anti-bioterrorism laboratory is needed to protect Texans’ health, security, and financial well-being.</div></div></div>
		</div>
	</div>
	<div class="director">
		<div class="layout-container"><div class="text-column"><div class="quote">Diagnostic work benefits the livestock industry and companion animals. We give our clients more value by surrounding raw test results with more interpretive information. </div><div class="creds">Bruce L. Akey, Director
<p>P.O. Drawer 3040<br>
College Station, TX 77841-3040<br>
979.845.3414</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/director-tvmdl.jpg" alt="Director Bruce L. Akey"></div></div>
	</div>
	<?php
});

genesis();
