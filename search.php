<?php get_header();	?>

<!-- container start -->
<div class="content-column"><?php 
	debug_location("Search");?>

	<article class="post" >
		<h2>Search results for: <?php the_search_query(); ?></h2>
	</article><?php

	if (have_posts()) :
		while (have_posts()) : the_post(); 
			get_template_part('content');
		endwhile;	
	else : ?>
		<article class="post">
			<nav class="site-nav">
				<p>Sorry, nothing found for your search!</p>
			</nav>
		</article><?php 
	endif; ?>
</div>
<!-- container end -->

<?php
get_sidebar();

get_footer();
?>