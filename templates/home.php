<?php
/**
 * Template Name: Home
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_action( 'wp_head', function(){
	?><link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"><?php
});
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){
	?><div id="overview">
		<div id="leaders-heading"><h1><span class="heading-1">Leaders in </span><span class="heading-2">Agriculture,<br> Natural Resources,<br> &amp; Life Sciences</span></h1></div>
		<div id="action-items">
			<div class="action-item full"><div class="description"><h2>Exceptional Items</h2>
				Texas A&M AgriLife Extension<br><br>
				Texas A&M AgriLife Research<br><br>
				Texas A&M Veterinary Medical Diagnostic Laboratory<br><br>
				Texas A&M Forest Service</div>
			</div>
			<div class="action-item bottom"><div class="description"><h2>What is Texas A&M AgriLife?</h2></div></div>
			<div class="action-item bottom"><div class="description"><h2>Impacts</h2>
				Residents, AgriLife Extensino, others work to 'Harvey-proof' Houston-area community</div>
			</div>
			<div class="action-item bottom"><div class="description"><h2>AgriLife Today</h2>
				Texas A&M AgriLife to lead consortium in establishing Center
			</div></div>
			<div class="action-item full"><div class="description"><h2>Vice Chancellor's Newsletter</h2></div></div>
		</div>
	</div>
	<div id="agencies"><ul><li class="tfs-item"><a href="http://texasforestservice.tamu.edu/"><span>Texas A&amp;M Forest Service</span></a></li><li class="tvmdl-item"><a href="http://tvmdl.tamu.edu/"><span>Texas A&amp;M Veterinary Medical Diagnostics Laboratory</span></a></li><li class="ext-item"><a href="http://agrilifeextension.tamu.edu/"><span>Texas A&amp;M AgriLife Extension Service</span></a></li><li class="res-item"><a href="http://agriliferesearch.tamu.edu/"><span>Texas A&amp;M AgriLife Research</span></a></li><li class="college-item"><a href="http://aglifesciences.tamu.edu/"><span>Texas A&amp;M College of Agrculture and Life Sciences</span></a></li></ul></div>
	<?php
});

genesis();
