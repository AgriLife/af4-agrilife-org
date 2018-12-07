<?php
/**
 * Template Name: Exceptional Item
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_entry_content', function(){
	?><div class="heading"><h1>Growing a Robust Seafood Industry</h1></div>
		<div class="wrap">
			<div class="right" data-sticky-container><div class="wrap" data-sticky data-anchor="left-column" data-margin-top="6" data-sticky-on="medium">
				<div class="logos"></div>
				<div class="text">
					<div class="request">
						<h3>Exceptional Item Request FY 2020–21</h3>
						<div class="value">$4 Million</div>
					</div>
					<hr />
					<h3>Objective</h3>
					<p>Innovate seafood breeding and production to improve the health of Texas coastal waters, strengthen the Texas seafood industry, and bolster resilience of coastal communities.</p>
				</div>
			</div></div>
			<div id="left-column" class="left">
				<h2>Background</h2><p class="background-text">The Texas seafood industry supports the economies of coastal Texas communities, but economic analyses show that the industry could greatly expand: The industry was heavily damaged by Hurricane Harvey and other catastrophic events, and, at present, about 90% of U.S. seafood is imported.</p>
				<h2>Program Description</h2><p>Texas A&M AgriLife Research and Texas A&M University-Corpus Christi (TAMUCC) propose a collaborative program that will:</p>
				<ul>
					<li>Develop breeding programs for shrimp, oysters, finfish, crabs, and other important marine species.</li>
					<li>Create innovative methods for aquaculture production to ensure supply stability.</li>
					<li>Improve the health of Texas’ coastal waters by linking aquaculture systems with natural marine environments and working with environmental organizations such as Texas OneGulf.</li>
					<li>Ensure consumer satisfaction by drawing on the expertise of Texas A&M AgriLife Extension Service’s consumer-based programs such as Healthy Texas, Dinner Tonight, and Path to the Plate.</li>
					<li>Give Texas a competitive boost in diverse seafood production and market saturation.</li>
				</ul>
				<h2>Major Accomplishments In The Next Two Years</h2>
				<ul>
					<li>Increase the production of seafood products from Texas bays and estuaries.</li>
					<li>Deliver a more diverse and nutritious supply of seafood to consumers in Texas and beyond.</li>
					<li>Improve the Texas Gulf Coast economy.</li>
					<li>Leverage additional funds from external sources to expand aquaculture programs in the state.</li>
				</ul>
				<h2>Major Accomplishments In The Next Two Years</h2>
				<div class="subheading">Unmet Demand for Texas Seafood</div>
				<ul>
					<li>Hurricane Harvey and other events have heavily damaged the Texas seafood industry.</li>
					<li>Texas shrimp and oyster fisheries contribute about $460 million to the economy per year, but about 90% of U.S. seafood is imported, resulting in a $14 billion trade deficit.</li>
				</ul>
				<h2>Solution</h2>
				<div class="subheading">Innovating Texas Seafood Production</div>
				<p>With adequate funding, AgriLife Research and TAMUCC can produce research advances to enhance Texas seafood breeding and production.<br>
				The partners have:</p>
				<ul>
					<li>Decades of combined expertise in Texas aquaculture.</li>
					<li>A history of successful collaborations.</li>
					<li>Core missions of solving problems, developing technologies, and applying technologies.</li>
				</ul>
				<p>The requested funds will help upgrade aquaculture facilities and capabilities, support development of intellectual property, and establish a competitive aquaculture seed-grant program.</p>
				<p>The seed grants will help obtain additional funding from federal agencies, corporations, and other external sources.</p>
				<div class="item-director"><div class="wrap">
					<h3>Patrick J. Stover, Ph.D.</h3>
					<p>Director, Texas A&M AgriLife Research</p>
				</div></div><div class="contact"><div class="wrap">
					<h2>Contact</h2>
					<h3>Other Guy</h3>
					<p>Director, Texas A&M AgriLife Research</p>
					<p>600 John Kimbrough Blvd., Suite 510, 2142 TAMU, College Station, TX 77843-2142</p>
					<p>Phone: 979-862-4384 | Email: vcdean@ag.tamu.edu</p>
				</div></div>
			</div>
	<?php
});

genesis();
