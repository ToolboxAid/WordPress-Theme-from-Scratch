	<?php
	/* Page is used for posts of type page */
	get_header();
	?>

	<div class="content-column">
		<?php
		debug_location("Page");

		if (have_posts()){ ?>
			<article class="post page"><?php
				if ( has_children() OR $post->post_parent > 0 ) { 
					/* add the child menu */ ?>
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
					</nav><?php
				}

				/* add the content */
				while (have_posts()) : the_post(); ?>		
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				<?php endwhile;	?>
			</article><?php
		} else {
			get_template_part('content-sorry');	
		}?>
	</div>

	<?php	
	get_sidebar();

	get_footer();
	?>