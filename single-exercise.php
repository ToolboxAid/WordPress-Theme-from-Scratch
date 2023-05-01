

<?php
/*
Template Name: SINGLE: Custom Post Template
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

        <?php if ( has_post_thumbnail() ) { ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('small-thumbnail'); ?>
            </div><!-- /post-thumbnail --> 
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

            the_content();

            $equipment = get_post_meta( get_the_ID(), 'equipment_group', true );
            if ( $equipment ) {
                echo '<h3>Equipment: </h3><p>' . esc_html( $equipment ) . '</p>';
            }

            $body = get_post_meta( get_the_ID(), 'body_group', true );
            if ( $body ) {
                echo '<h3>Body Group: </h3><p>' . esc_html( $body ) . '</p>';
            }

            $muscle = get_post_meta( get_the_ID(), 'muscle_group', true );
            if ( $muscle ) {
                echo '<h3>Muscle Group: </h3><p>' . esc_html( $muscle ) . '</p>';
            } ?>
            <div class="muscle-groups">
                <h3>Muscles used:</h3>           
                <?php if ( $primary_muscle_group = get_post_meta( get_the_ID(), 'primary_muscle_group', true ) ) : ?>
                <p><strong>Primary:</strong> <?php echo esc_html( $primary_muscle_group ); ?></p>
                <?php endif; ?>
                <?php if ( $secondary_muscle_group = get_post_meta( get_the_ID(), 'secondary_muscle_group', true ) ) : ?>
                <p><strong>Secondary:</strong> <?php echo esc_html( $secondary_muscle_group ); ?></p>
                <?php endif; ?>
                <?php if ( $tertiary_muscle_group = get_post_meta( get_the_ID(), 'tertiary_muscle_group', true ) ) : ?>
                <p><strong>Tertiary:</strong> <?php echo esc_html( $tertiary_muscle_group ); ?></p>
                <?php endif; ?>
            </div> 
            <?php             
            $difficulty_group = get_post_meta( get_the_ID(), 'difficulty_group', true );
            if ( ! empty( $difficulty_group ) ) {
                echo '<h3>Difficulty:</h3>';
                echo '<ul>';
                foreach ( $difficulty_group as $option ) {
                    echo '<li><p>' . esc_html( $option ) . '</p></li>';
                }
                echo '</ul>';
            }        

        get_template_part( 'content-comments' );  ?>
        </div>

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