<?php get_header();
?>

<!-- container start -->
<div class="content-column">
	
	<?php 

	debug_location("Index");

	if (have_posts()) :
		while (have_posts()) : the_post(); 
			get_template_part('content'); 
		endwhile;	
	else : 
		get_template_part('content-sorry');
	endif; ?>
</div>
<!-- container end -->

<?php 
get_sidebar(); 

get_footer();
?>