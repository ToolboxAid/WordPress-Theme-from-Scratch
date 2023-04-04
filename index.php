		<?php get_header(); 		
		debug_location("Index");
		?>
<!-- container start -->

		<div class="content-column">
			<?php if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	
	<article class="post">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<p class="post-info"><?php the_time('F jS, Y @ g:i A'); ?> by <?php echo get_the_author_meta('display_name'); ?> | Posted in
			
			<?php
			$categories = get_the_category();
			$separator = ", ";
			$output = '';
			
			if ($categories) {
				
				foreach ($categories as $category) {				
					$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;
				}				
				echo trim($output, $separator);
			}
			?>
			
			</p>
		
		<?php the_content(); ?>
	</article>
	
	<?php endwhile;
	
	else :
		echo '<p>No content found</p>';
	
	endif; ?>
		</div>
		<div class="sidebar-column">
			<div class="widget">
				<h3>Sidebar Widget(s)</h3>
			</div>

			<div class="widget">
			<h3>Widget 1</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, diam eget interdum malesuada, mauris est rutrum velit, vel pulvinar augue eros eu justo. Aenean blandit arcu sit amet erat bibendum tempus.</p>
			</div>

			<div class="widget">
			<h3>Widget 2</h3>
			<p>Nulla id lorem ac erat hendrerit finibus. Sed sit amet nulla lectus. Fusce hendrerit dui ut lorem lobortis lobortis. Donec ac ex euismod, faucibus leo vel, ultrices sapien. Donec tincidunt enim at dolor maximus imperdiet.</p>
			</div>

			<div class="widget">
			<h3>Widget 3</h3>
			<p>Nulla id lorem ac erat hendrerit finibus. Sed sit amet nulla lectus. Fusce hendrerit dui ut lorem lobortis lobortis. Donec ac ex euismod, faucibus leo vel, ultrices sapien. Donec tincidunt enim at dolor maximus imperdiet.</p>
			</div>


			<div class="widget">
			<h3>Widget 4</h3>
			<p>Nulla id lorem ac erat hendrerit finibus. Sed sit amet nulla lectus. Fusce hendrerit dui ut lorem lobortis lobortis. Donec ac ex euismod, faucibus leo vel, ultrices sapien. Donec tincidunt enim at dolor maximus imperdiet.</p>
		</div>
<!-- container end -->
			<?php get_footer(); ?>