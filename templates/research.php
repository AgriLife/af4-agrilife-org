<?php
/**
 * Template Name: Research
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){
	?><div class="content-heading-image flow-arrow">
		<div class="wrap">
			<img class="background hide-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/research-header-small-640.jpg"<?php

				$widths = array(640, 720, 800, 880, 960, 1040, 1280);
				$srcset = array();
				$sizes = array();
				$len = count($widths);

				foreach ($widths as $key => $value) {
					$srcset[] = sprintf(ALAF4_DIR_URL . 'images/research-header-small-%s.jpg %sw', $value, $value);
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

			?>><img class="background show-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/research-header-background-1900.jpg"<?php

				$widths = array(1024, 1200, 1440, 1900);
				$srcset = array();
				$sizes = array();
				$len = count($widths);

				foreach ($widths as $key => $value) {
					$srcset[] = sprintf(ALAF4_DIR_URL . 'images/research-header-background-%s.jpg %sw', $value, $value);
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
			<h1>Research</h1>
		</div>
	</div>
	<div class="introduction layout-container flow-arrow"><p><a href="https://agrilife.org/agrilife-agencies/research-home/">Texas A&M AgriLife Research</a> is the leading research and technology development agency in Texas. We conduct more than 500 agriculture, natural resources, and the life sciences projects each year supported with more than $206.9 million in research funding in 2016. We have a statewide presence and collaborate with scientists and research staff on other Texas A&M University System campuses and at the 13 regional Texas A&M AgriLife Research and Extension Centers. Our scientists span many disciplines uniting with other centers and entities improve in the following fields: </p></div>
	<div class="flowchart brackets flow-arrow">
		<div class="layout-container">
			<div class="flowchart-row top">
				<div class="al item">
					<a href="https://agriliferesearch.tamu.edu/" title="Texas A&M AgriLife Research"><span><img src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-agrilife-research.png" alt="Texas A&M AgriLife Research"></span></a>
				</div>
			</div>
			<div class="flowchart-row bottom"><div class="item"><a href="http://agriliferesearch.tamu.edu/topic/disease-prevention/"><span>Disease Prevention & Vector-Borne Diseases</span><span class="arrow"><img src="<?php echo ALAF4_DIR_URL; ?>/images/urarr-48x48.png"></span></a></div><div class="item"><a href="http://agriliferesearch.tamu.edu/topic/land-use/"><span>Land Use</span><span class="arrow"><img src="<?php echo ALAF4_DIR_URL; ?>/images/urarr-48x48.png"></span></a></div><div class="item"><a href="http://agriliferesearch.tamu.edu/topic/bioenergy/"><span>Bioenergy &amp; Sustainability</span><span class="arrow"><img src="<?php echo ALAF4_DIR_URL; ?>/images/urarr-48x48.png"></span></a></div><div class="item"><a href="http://agriliferesearch.tamu.edu/topic/food-nutrition/"><span>Food &amp; Nutrition</span><span class="arrow"><img src="<?php echo ALAF4_DIR_URL; ?>/images/urarr-48x48.png"></span></a></div><div class="item"><a href="http://agriliferesearch.tamu.edu/topic/new-crops/"><span>New Crops</span><span class="arrow"><img src="<?php echo ALAF4_DIR_URL; ?>/images/urarr-48x48.png"></span></a></div></div>
			<div class="flowchart-row bottom"><div class="item"><a href="http://agriliferesearch.tamu.edu/topic/pests-invasive-plants/"><span>Pests &amp; Invasive Plants</span><span class="arrow"><img src="<?php echo ALAF4_DIR_URL; ?>/images/urarr-48x48.png"></span></a></div><div class="item"><a href="http://agriliferesearch.tamu.edu/topic/livestock-plant-genetics/"><span>Livestock &amp; Plant Genetics</span><span class="arrow"><img src="<?php echo ALAF4_DIR_URL; ?>/images/urarr-48x48.png"></span></a></div></div>
		</div>
	</div>
	<div class="buttons flow-arrow"><a class="button" href="https://agriliferesearch.tamu.edu/">agriliferesearch.tamu.edu</a></div>
	<div class="exceptional-items">
		<div class="layout-container">
			<h2>Exceptional Items</h2>
			<div class="row"><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/fi-drone-cam.jpg" alt="Drone"></div><h3>Connecting Texas Agriculture</h3><div class="description">Connecting food, health, and agriculture through a wide-ranging collaboration will fortify the Texas economy and improve Texans’ health and quality of life.</div></div><div class="item"><div class="photo"><img src="<?php echo ALAF4_DIR_URL; ?>images/fi-oysters.jpg" alt="Oysters"></div><h3>Growing a Robust Seafood Industry</h3><div class="description">Innovating Texas seafood production will revive coastal waters, strengthen the seafood industry, and bolster the resilience of coastal communities.</div></div></div>
		</div>
	</div>
	<div class="director with-strategic-plan">
		<div class="layout-container"><div class="text-column"><div class="quote">In Texas, agriculture has a strong economic significance in our state and Texas A&M AgriLife Research has made many discoveries through the decades to help improve both production agriculture and healthy food. </div><div class="creds">Dr. Patrick J. Stover, Acting Director
<p>Agriculture and Life Sciences Building<br>
600 John Kimbrough Boulevard, Suite 512<br>
College Station, Texas 77843<br>
979.845.8486</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/research-director.jpg" alt="Dr. Parr Rosson"></div></div>
		<div class="strategic-plan"><a class="button" href="https://agrilifecdn.tamu.edu/research/files/2016/10/AgriLifeResearchStrategicPlanFY16-20.pdf">Strategic Plan</a></div>
	</div>
	<?php
});

genesis();
