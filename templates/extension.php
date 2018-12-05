<?php
/**
 * Template Name: Extension
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){
	?><div class="content-heading-image flow-arrow">
		<div class="wrap">
			<img class="background hide-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/extension-header-small-640.jpg"<?php

				$widths = array(640, 720, 800, 880, 960, 1040, 1280);
				$srcset = array();
				$sizes = array();
				$len = count($widths);

				foreach ($widths as $key => $value) {
					$srcset[] = sprintf(ALAF4_DIR_URL . 'images/extension-header-small-%s.jpg %sw', $value, $value);
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

			?>><img class="background show-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/extension-header-background-1900.jpg"<?php

				$widths = array(1024, 1200, 1440, 1900);
				$srcset = array();
				$sizes = array();
				$len = count($widths);

				foreach ($widths as $key => $value) {
					$srcset[] = sprintf(ALAF4_DIR_URL . 'images/extension-header-background-%s.jpg %sw', $value, $value);
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
			<h1>Extension</h1>
		</div>
	</div>
	<div class="introduction layout-container flow-arrow"><p>The Texas A&M AgriLife Extension Service is an statewide education agency made up of professional educators, trained volunteers, and county offices. We address critical needs in every Texas county through Extension county offices. AgriLife Extension enables Texans to better their lives through various educational programs, activities and resources.</p>
		<p>All of our programs provide objective, practical and science-based information in conjunction with <a href="https://aglifesciences.tamu.edu/">Texas A&M University’s College of Agriculture & Life Sciences</a>.</p>
		<p>Some of our major efforts are:</p></div>
	<div class="flowchart brackets flow-arrow">
		<div class="layout-container">
			<div class="flowchart-row top">
				<div class="al item">
					<a href="https://agrilifeextension.tamu.edu/" title="Texas A&M AgriLife Extension"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife-extension.png" alt="Texas A&M AgriLife Extension"></span></a>
				</div>
			</div>
			<div class="flowchart-row bottom"><div class="ext item"><p><span>Livestock &amp; Crop Protection</span></p></div><div class="res item"><p><span>Drought Mitigation &amp; Water Conservation</span></p></div><div class="college item"><p><span>Increasing Food Security Practices</span></p></div><div class="tvmdl item"><p><span>Health &amp; Wellness Education</span></p></div><div class="tfs item"><p><span>Youth Development</span></p></div></div>
		</div>
	</div>
	<div class="buttons flow-arrow"><a class="button" href="https://agrilifeextension.tamu.edu/">AGRILIFEEXTENSION.TAMU.EDU</a></div>
	<div class="exceptional-items">
		<div class="layout-container">
			<h2>Exceptional Items</h2>
			<div class="row"><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/flooding-cars.jpg" alt="Flooding"></div><h3>Disaster Readiness &amp; Recovery for Texas</h3><div class="description">Improving Texas’ disaster readiness means preparing local jurisdictions for natural disaster response and recovery.</div></div><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/mosquito.jpg" alt="Mosquito"></div><h3>Wildlife &amp; Zoonotic Disease Surveillance</h3><div class="description">Enhanced surveillance for wildlife and zoonotic diseases would help Texas officials respond to, predict, and prevent outbreaks.</div></div></div>
		</div>
	</div>
	<div class="director with-strategic-plan">
		<div class="layout-container"><div class="text-column"><div class="quote">We provide quality, relevant education and services to the state of Texas and Texans. </div><div class="creds">Dr. Parr Rosson, Interim Director
<p>Agriculture and Life Sciences Building<br>
600 John Kimbrough Boulevard, Suite 509<br>
College Station, TX 77843-7101<br>
979.845.7800</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/extension-director.jpg" alt="Dr. Parr Rosson"></div></div>
		<div class="strategic-plan"><a class="button" href="
	https://agriliferoot.agrilife.org/wp-content/uploads/2018/12/txextension-strategic-plan-2017-2021.pdf">Strategic Plan</a></div>
	</div>
	<?php
});

genesis();
