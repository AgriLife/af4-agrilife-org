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
	<div class="introduction layout-container"><p><a href="https://aglifesciences.tamu.edu/" title="Texas A&M College of Agriculture and Life Sciences"><img class="logo coals-logo" src="<?php echo AF_THEME_DIRURL; ?>/images/logo-tamu-coals-vertical.png" alt="Texas A&M College of Agriculture and Life Sciences"></a></p><p>Agriculture and the life sciences has been an integral part of Texas A&M since 1876 when it was founded as the Agricultural and Mechanical College of Texas.  Naturally, with agriculture as one of the pillars on which Texas A&M University was established, the students we educate and the scientiﬁc advancements we discover are providing better nutrition and agriculture.</p><p>From long-established majors such as agronomy and animal science to newer programs such as forensics and spatial sciences, the College of Agriculture and Life Sciences is widely recognized as a leader in dozens of academic disciplines.</p></div>
	<div class="buttons"><a class="button" href="https://aglifesciences.tamu.edu/">aglifesciences.tamu.edu</a></div>
	<div class="director">
		<div class="layout-container"><div class="text-column"><div class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies vestibulum ornare. Morbi eget consequat augue. Pellentesque lacinia eget nibh ut dapibus. Mauris metus dui, pulvinar nec nibh id, suscipit aliquam dolor. </div><div class="creds">Patrick J. Stover, Vice Chancellor and Dean
<p>Morbi eget consequat augue pellentesque<br>
Mauris metus dui, pulvinar nec nibh id suscipit<br>
Vestibulum nec interdum velit curabitur nec bibendum metus</p></div></div><div class="photo-column"><img src="<?php echo ALAF4_DIR_URL; ?>images/research-director.jpg" alt="Patrick J. Stover"></div></div>
	</div>
	<?php
});

genesis();
