	<?php
	/* Page is used for archives of type post */
	get_header();
	?>
	<div class="content-column"><?php
	debug_location("Archive");

		if (have_posts()) : ?>
			<article class="post">
				<h2><?php
					if ( is_category() ) {
						single_cat_title();
					} elseif ( is_tag() ) {
						single_tag_title();
					} elseif ( is_author() ) {
						the_post();
						echo 'Author Archives: ' . get_the_author();
						rewind_posts();
					} elseif ( is_day() ) {
						echo 'Daily Archives: ' . get_the_date();
					} elseif ( is_month() ) {
						echo 'Monthly Archives: ' . get_the_date('F Y');
					} elseif ( is_year() ) {
						echo 'Yearly Archives: ' . get_the_date('Y');
					} else {
						echo 'Archives:';
					}?>
				</h2>
			</article>

			<?php
			while (have_posts()) : the_post(); ?>
			
			
				<article class="post image-container <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
					
					<!-- post-thumbnail -->
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
					</div><!-- /post-thumbnail -->
					
					
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					
					<p class="post-info"><?php the_time('F jS, Y @ g:i A'); ?> by <?php
						if (get_the_author_meta('display_name')) {
							$display_name = get_the_author_meta('display_name');
							echo $display_name; 
						} else {
							$current_user = wp_get_current_user();
							$user_nickname = get_user_meta($current_user->ID, 'nickname', true);
							echo $user_nickname;
						}		

						?> | Posted in: <?php
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

					<?php if ($post->post_excerpt) { ?>			
						<p><?php echo get_the_excerpt(); ?> [...]<a href="<?php the_permalink(); ?>"> Read more&raquo;</a></p>			
					<?php } else {			
						echo get_the_excerpt();?><a href="<?php the_permalink(); ?>"> Read more&raquo;</a>	<?php
					} ?>
				</article><?php 
			endwhile;	
			else :
				echo '<nav class="site-nav">';
				echo '<p>Sorry, we are just too lazy to load any Pages!</p>';		
				echo '</nav>';
				endif; 
			 ?>
	</div>

	<div class="sidebar-column">
		<div class="widget">
			Widgit 1
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		</div>
		<div class="widget">
			Widgit 2
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		</div>
		<div class="widget">
			Widgit 3
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		</div>
		<div class="widget">
			Widgit 4
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		</div>
	</div>

	<?php	
	get_footer();
	?>