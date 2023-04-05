		
	<?php
		if ( is_search() OR is_archive() or is_home() ) { ?>
			<!-- post-thumbnail -->
			<article class="post image-container <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
				<div class="post-thumbnail"><?php 		
					debug_location("______ - A");?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
				</div><!-- /post-thumbnail --> 
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php 
		} else { ?>
			<!-- post-banner -->
			<article class="post image-banner <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
<?php
$image_id = get_post_thumbnail_id(); // Get the ID of the featured image
$image_url = wp_get_attachment_image_src($image_id, 'banner-image')[0]; // Get the URL of the 'banner-image' size
?>

				<div class="post-banner" style="background-image: url('<?php echo $image_url; ?>')"><?php 		
					debug_location("______ - B");?>
				</div><!-- /post-banner -->
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php 
		} 
		
		?>

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
		</p><?php 
		
		if ( is_search() OR is_archive() ) { 
debug_location("______ - __1");?>
			<p>
				<?php echo get_the_excerpt(); 
				if (has_excerpt()){
					echo "[....]";
				}
				?>

				<a href="<?php the_permalink(); ?>">Read more1&raquo;</a>
			</p><?php 
		} else {
			if (is_home()) { // The blog page (index.php)
debug_location("______ - __2");?>
					<p>
						<?php echo get_the_excerpt(); 
										if (has_excerpt()){
											echo "[....]";
										}
										?>
						<a href="<?php the_permalink(); ?>">Read more2 &raquo;</a>
					</p><?php 
			} else {
debug_location("______ - __3");
				the_content();
			}
		} ?>

	</article>
