<?php
/*
Template Name: SINGLE: Custom Post Template
Template Post Type: post
*/

/* Page is used for posts of type page */
get_header();

debug_location("Single");	?>
<div class="content-column"><?php


if (have_posts()) :
	while (have_posts()) : the_post(); 
		get_template_part('content');
	endwhile;	
else : 
	get_template_part('content-sorry');
endif; ?>


</div>

<?php get_template_part('content-sidebar'); ?>

<?php	
get_footer();
?>