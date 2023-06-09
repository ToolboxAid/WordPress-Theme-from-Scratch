<?php


/* Page is used for posts of type page */
get_header();

debug_location("Single"); ?>

<div class="content-column"><?php

if (have_posts()) :
	while (have_posts()) : the_post(); 
		get_template_part('content');
	endwhile;	

	// Previous/next post navigation.
	get_template_part( 'content-pagination-post' );         
else : 
	get_template_part('content-sorry');
endif; ?>

</div>

<?php
get_sidebar();

get_footer();
?>