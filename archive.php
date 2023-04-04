	<?php
	/* Page is used for posts of type page */
	get_header();
	?>


	<div class="content-column">

<?php if (have_posts()) : ?>
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
		}	
	?></h2>
		</article>
	<?php
	while (have_posts()) : the_post(); ?>
	
	<article class="post">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<p class="post-info"><?php the_time('F j, Y g:i a'); ?> | 
			by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>

			| Posted in: 
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
		
		<?php the_excerpt(); ?>
	</article>
	
	<?php endwhile;
	
	else :
		echo '<p>No content found</p>';
	
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