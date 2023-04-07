<?php
	/* Page is used for posts of type page */
	get_header(); ?>

	<div class="content-column"><?php
		debug_location("Front-Page"); ?>

		<article class="post page"> <?php
			while (have_posts()) : the_post(); ?>		
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			<?php endwhile;	?>
		</article>				
	</div>
	<?php	
	get_sidebar();

	get_footer();
	?>