	<?php
	/* Page is used for posts of type page */
	get_header();
	?>

	<div class="content-column">
		<article class="post page">
			<?php
			debug_location("Page");

			if ( has_children() OR $post->post_parent > 0 ) { ?>			
				<nav class="site-nav children-links">

				<span class="parent-link">
					<a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>">
					<?php echo get_the_title(get_top_ancestor_id()); ?></a>
				</span>
				<span class="parent-seperator">|</span>

					<ul>
						<?php
						$args = array(
							'child_of' => get_top_ancestor_id(),
							'title_li' => ''
						); ?>
						<?php wp_list_pages($args); ?>
					</ul>
				</nav>			
			<?php } 

			if (have_posts()) :
				while (have_posts()) : the_post(); ?>		
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				<?php endwhile;	
			else :
				echo '<nav class="site-nav">';
				echo '<p>Sorry, we are just too lazy to load any Pages!</p>';		
				echo '</nav>';
				endif; 
			?>
		</article>	
	</div>

	<?php	
	get_sidebar();

	get_footer();
	?>