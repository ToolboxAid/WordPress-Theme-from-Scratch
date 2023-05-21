	<?php
		if ( is_search() OR is_archive() or is_home() ) { ?>		
			<!-- post-thumbnail -->
			<?php if ( has_post_thumbnail() ) { ?>
			<article class="post image-container has-thumbnail">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
				</div><!-- /post-thumbnail --> 
			<?php } else { ?>
			<article class="post image-container">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
<div class="post-thumbnail";>				
	<a href="<?php the_permalink(); ?>" style="background-position: top left;">
	<img class="ex_image-<?php echo get_the_ID(); ?>" ></image>
	<!-- width="180" height="180" sizes="(max-width: 180px) 100vw, 180px" -->
	</a>
</div>
	

<?php
$image_name = get_post_meta( get_the_ID(), 'image_name', true );
$image_across = get_post_meta( get_the_ID(), 'image_across', true );
$image_down = get_post_meta( get_the_ID(), 'image_down', true );
$uploads_dir = wp_upload_dir();
$exercises_dir = $uploads_dir['basedir'] . '/tba/exercises';
$file_path = $exercises_dir . '/' . $image_name . '.properties';
if (file_exists($file_path)) {
	$props = parse_ini_file($file_path);// get the values for the properties                        
	$offsetX = intval($props['offsetX']);
	$offsetY = intval($props['offsetY']);
	$topLeftX  = 0; //intval($props['topLeftX']);
	$topLeftY  = 0; // intval($props['topLeftY']);
	$bottomRightX  = intval($props['bottomRightX']);
	$bottomRightY  = intval($props['bottomRightY']);
	$imagesX  = intval($props['imagesX']);
	$imagesY  = intval($props['imagesY']); 
	
	$imageW = intval( ( ( $bottomRightX - $offsetX )  /  $imagesX) );
	$imageH = intval( ( ( $bottomRightY - $offsetY )  /  $imagesY) );
	$imageX = $offsetX + ($image_across * $imageW);// Across X
	$imageY = $offsetY + ($image_down * $imageH);// Down Y

	// // // echo "A: " . $image_across . "<br>";
	// // // echo "D: " . $image_down . "<br>";
	// // // echo "W: " . $imageW . "<br>";
	// // // echo "H: " . $imageH . "<br>";                
	// // // echo "X: " . $imageX . "<br>";
	// // // echo "Y: " . $imageY . "<br>";   

echo "<style> .ex_image-" . get_the_ID() . " { transform: scale(1,1); background: url('/wp-content/uploads/tba/exercises/". $image_name . ".png')";
echo "-" . $imageX . "px -" . $imageY . "px;";
echo "width: " . $imageW . "px; height: 220px;";
echo " } </style>";

	// echo "<style>";
	// 	echo ".exer-image-" . get_the_ID() . " {";
	// 	echo "background-image: url('/wp-content/uploads/tba/exercises/". $image_name . ".png');";
	// 	echo "background-position: -" . $imageX . "px -" . $imageY . "px;";
	// 	echo "width: " . $imageW . "px;";
	// 	echo "height: " . $imageH . "px;";
	// 	echo "float: left;";
	// 	echo "transform: scale(0.25,0.25); ";
	// 	echo "}";
	// echo "</style>";
} ?>



			<?php } ?>
		<?php } else { ?>
			<!-- post-banner is_single() -->
			<?php if ( has_post_thumbnail() ) { ?>
			<article class="post image-banner has-thumbnail">
				<h2><?php the_title(); ?></h2>
			<?php } else { ?>
			<article class="post image-banner">
				<h2><?php the_title(); ?></h2>
			<?php } ?>
		<?php } ?>

		<div id="content-container">
		<p class="post-info">
			<i class="fa fa-calendar" aria-hidden="true"></i>
			<?php the_time(' F jS, Y '); ?>
			<i class="fa fa-clock-o" aria-hidden="true"></i>
			<?php the_time(' g:i A '); 
				echo '<i class="fa fa-user" aria-hidden="true"></i> ';
				if (get_the_author_meta('display_name')) {
				$display_name = get_the_author_meta('display_name');
				echo $display_name; 
			} else {
				$current_user = wp_get_current_user();
				$user_nickname = get_user_meta($current_user->ID, 'nickname', true);
				echo $user_nickname;
			}		

			?> <i class="fa fa-gear fa-spin" aria-hidden="true"></i> Categories: <?php
			$categories = get_the_category();
			$separator = ", ";
			$output = '';
			
			if ($categories) {				
				foreach ($categories as $category) {				
					$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;
				}				
				echo trim($output, $separator);
			} ?>		
			</p>		
			<?php 
			if ( is_search() OR is_archive() ) { 
				debug_location("______ - __1");?>
				<p>
					<?php echo get_the_excerpt(); 
					if (has_excerpt()){
						echo "[....]";
					} ?>
					<a href="<?php the_permalink(); ?>">Read more &raquo;</a>
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
							<a href="<?php the_permalink(); ?>">Read more &raquo;</a>
						</p><?php 
				} else {
					debug_location("______ - __3");
					the_content();
get_template_part( 'content-comments' );
				}
			} ?>
		</div>

	</article>
