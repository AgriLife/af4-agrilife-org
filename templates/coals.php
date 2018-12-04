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
			<img class="background hide-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/coals-header-small-640.jpg"<?php

				$widths = array(640, 720, 800, 880, 960, 1040, 1280);
				$srcset = array();
				$sizes = array();
				$len = count($widths);

				foreach ($widths as $key => $value) {
					$srcset[] = sprintf(ALAF4_DIR_URL . 'images/coals-header-small-%s.jpg %sw', $value, $value);
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

			?>><img class="background show-for-medium" src="<?php echo ALAF4_DIR_URL; ?>images/coals-header-background-1900.jpg"<?php

				$widths = array(1024, 1200, 1440, 1900);
				$srcset = array();
				$sizes = array();
				$len = count($widths);

				foreach ($widths as $key => $value) {
					$srcset[] = sprintf(ALAF4_DIR_URL . 'images/coals-header-background-%s.jpg %sw', $value, $value);
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
			<h1>Agriculture <div>&amp; Life Sciences</div></h1>
		</div>
	</div>
	<div class="introduction layout-container"><p>Agriculture and the life sciences has been an integral part of Texas A&M since 1876 when it was founded as the Agricultural and Mechanical College of Texas. Naturally, with agriculture as one of the pillars on which Texas A&M University was established, the students we educate and the scientific advancements we discover are providing better nutrition and agriculture.</p><p>From long-established majors such as agronomy and animal science to newer programs such as forensics and spatial sciences, the <a href="https://aglifesciences.tamu.edu/">College of Agriculture and Life Sciences</a> is widely recognized as a leader in <a href="https://aglifesciences.tamu.edu/academics/departments/">dozens of academic disciplines</a>.</p></div>
	<div class="buttons"><a class="button" href="https://aglifesciences.tamu.edu/">aglifesciences.tamu.edu</a></div>
	<div class="director">
		<div class="layout-container"><div class="text-column"><div class="quote">We can leverage the strength of Texas agriculture with our commitment to improving the health and wellbeing of Texas communities through our agencies and college faculty. </div><div class="creds">Patrick J. Stover, Vice Chancellor and Dean
<p>Agriculture and Life Sciences Building<br>
600 John Kimbrough Blvd., Suite 510<br>
2142 TAMU<br>
College Station, TX 77843-2142<br>
979.845.3712</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/research-director.jpg" alt="Patrick J. Stover"></div></div>
	</div>
	<div class="buttons"><a class="button" href="https://agrilifecdn.tamu.edu/wp-content/uploads/ALS_Strategic-Plan_2015.pdf">Strategic Plan</a></div>
	<?php
});

genesis();
