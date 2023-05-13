<?php get_header(); ?>

<div class="content-column">
	
	<?php 

	debug_location("Index");

	if (have_posts()) {
		while (have_posts()) : the_post(); 
			get_template_part('content');
		endwhile;
		get_template_part( 'content-pagination' ); 
	} else {
		get_template_part('content-sorry');
	} ?>
</div>

<?php 
get_sidebar(); 

get_footer();
?>