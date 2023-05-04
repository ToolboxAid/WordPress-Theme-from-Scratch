

<?php
/*
Template Name: Single Exercise
Template Post Type: post
*/

/* Page is used for posts of type page */
get_header();

debug_location("Single-exercise"); ?>

<div class="content-column"><?php

if (have_posts()) :
	while (have_posts()) : the_post(); ?>

    <!-- post-thumbnail -->
    <article class="post image-container has-thumbnail">
        <h2><?php the_title(); ?></h2>
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
                } ?>
                
                <i class="fa fa-gear fa-spin" aria-hidden="true"></i> Categories: <?php
                $categories = get_the_category();
                $separator = ", ";
                $output = '';
                
                if ($categories) {				
                    foreach ($categories as $category) {				
                        $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;
                    }				
                    echo trim($output, $separator);
                } ?>
            </p><?php
                    $workout_type = get_post_meta( get_the_ID(), 'workout_type', true );
                    if ( $workout_type ) {
                        echo '<p><h3 style="display: inline;">Type: </h3>' . esc_html( $workout_type ) . '</p>';
                    }
                    $equipment = get_post_meta( get_the_ID(), 'equipment_group', true );
                    if ( $equipment ) {
                        echo '<p><h3 style="display: inline;">Equipment: </h3>' . esc_html( $equipment ) . '</p>';
                    }

the_content(); ?>
            <div id="exercise_container" style="display: flex;">
                <div id="exercise_data" style="    flex: 1; width: 45%;">
                <?php
                    $body = get_post_meta( get_the_ID(), 'body_group', true );
                    if ( $body ) {
                        echo '<p><h3 style="display: inline;">Body Group: </h3>' . esc_html( $body ) . '</p>';
                    }

                    $muscle_group = get_post_meta( get_the_ID(), 'muscle_group', true );
                    if ( ! empty( $muscle_group ) ) {
                        echo '<p><h3 style="display: inline;">Muscle Group(s): </h3>';
                        echo implode( ', ', array_map( 'esc_html', $muscle_group ) ) . '</p>';
                    } ?>

                    <h3>Muscles used:</h3>           
                    <div class="muscle-groups" style="padding-left:30px;">
                    <?php if ( $primary_muscle_group = get_post_meta( get_the_ID(), 'primary_muscle_group', true ) ) : ?>
                    <p style="display: inline;"><strong>Primary:</strong> </p><?php echo esc_html( $primary_muscle_group ); ?><br>
                    <?php endif; ?>

                    <?php if ( $secondary_muscle_group = get_post_meta( get_the_ID(), 'secondary_muscle_group', true ) ) : ?>
                    <p style="display: inline;"><strong>Secondary:</strong></p> <?php echo esc_html( $secondary_muscle_group ); ?><br>
                    <?php endif; ?>

                    <?php if ( $tertiary_muscle_group = get_post_meta( get_the_ID(), 'tertiary_muscle_group', true ) ) : ?>
                    <p style="display: inline;"><strong>Tertiary:</strong></p> <?php echo esc_html( $tertiary_muscle_group ); ?><br>
                    <?php endif; ?>
                </div> <?php               
                $difficulty_group = get_post_meta( get_the_ID(), 'difficulty_group', true );
                if ( ! empty( $difficulty_group ) ) {
                    echo '<p><h3 style="display: inline;">Difficulty: </h3>';
                    echo implode( ', ', array_map( 'esc_html', $difficulty_group ) ) . '</p>';
                } ?>
            </div>
            <div id="exercise_image" style="margin-left: 20px; width: 45%;">
            <div class="image"></div>
            </div> <?php

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
                $topLeftX  = intval($props['topLeftX']);
                $topLeftY  = intval($props['topLeftY']);
                $bottomRightX  = intval($props['bottomRightX']);
                $bottomRightY  = intval($props['bottomRightY']);
                $imagesX  = intval($props['imagesX']);
                $imagesY  = intval($props['imagesY']);    
                
                $imageW = ( $bottomRightX - $topLeftX ) /  $imagesX;
                $imageH = ( $bottomRightY - $topLeftY ) /  $imagesY;
                $imageX = $offsetX + ($image_across * $imageW);// Across X
                $imageY = $offsetY + ($image_down * $imageH);// Down Y

                echo "<style>";
                    echo ".image {";
                    echo "background-image: url('/wp-content/uploads/tba/exercises/". $image_name . ".png');";
                    echo "background-position: -" . $imageX . "px -" . $imageY . "px;";
                    echo "width: " . $imageW . "px;";
                    echo "height: " . $imageH . "px;";
                echo "</style>";
            } ?>

        </div> <?php
        get_template_part( 'content-comments' );  ?>
	</article>
<?php

	endwhile;	

	// Previous/next post navigation.
	get_template_part( 'content-pagination-post' );  
     
else : 
	get_template_part('content-sorry');
endif; ?>

</div>

<?php
get_sidebar();

get_footer();
?>