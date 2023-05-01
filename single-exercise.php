

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
	while (have_posts()) : the_post(); 

		get_template_part('content');
        
        $equipment = get_post_meta( get_the_ID(), 'equipment_group', true );
        if ( $equipment ) {
            echo '<p><strong>Equipment: </strong>' . esc_html( $equipment ) . '</p>';
        }

        $body = get_post_meta( get_the_ID(), 'body_group', true );
        if ( $body ) {
            echo '<p><strong>Body: </strong>' . esc_html( $body ) . '</p>';
        }

        $muscle = get_post_meta( get_the_ID(), 'muscle_group', true );
        if ( $muscle ) {
            echo '<p><strong>Muscle: </strong>' . esc_html( $muscle ) . '</p>';
        }        
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