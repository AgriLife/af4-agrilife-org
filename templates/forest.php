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
			<img class="background hide-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/forest-header-small-640.jpg"<?php

				$widths = array(640, 720, 800, 880, 960, 1040, 1280);
				$srcset = array();
				$sizes = array();
				$len = count($widths);

				foreach ($widths as $key => $value) {
					$srcset[] = sprintf(ALAF4_DIR_URL . 'images/forest-header-small-%s.jpg %sw', $value, $value);
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

			?>><img class="background show-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/forest-header-background-1900.jpg"<?php

				$widths = array(1024, 1200, 1440, 1900);
				$srcset = array();
				$sizes = array();
				$len = count($widths);

				foreach ($widths as $key => $value) {
					$srcset[] = sprintf(ALAF4_DIR_URL . 'images/forest-header-background-%s.jpg %sw', $value, $value);
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
			<h1>Forest Service</h1>
		</div>
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
Vestibulum nec interdum velit curabitur nec bibendum metus</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/director-forest.jpg" alt="Tom G. Boggus"></div></div>
	</div>
	<?php
});

genesis();
