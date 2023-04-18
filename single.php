<?php
/*
Template Name: SINGLE: Custom Post Template
Template Post Type: post
*/

/* Page is used for posts of type page */
get_header();

debug_location("Single"); ?>

<div class="content-column"><?php

if (have_posts()) :
	while (have_posts()) : the_post(); 
		get_template_part('content');

        // Previous/next post navigation.
        the_post_navigation(
            array(
                'next_text' => __( 'Next post: %title', 'qbytesworld_WordPress' ),
                'prev_text' => __( 'Previous post: %title', 'qbytesworld_WordPress' ),
            )
        );	
        // the_post_navigation(
        //     array(
        //         'next_text' => __( 'Next post: %title', 'qbytesworld_WordPress' ),
        //         'prev_text' => __( 'Previous post: %title', 'qbytesworld_WordPress' ),
        //     )
        // );			
		
	endwhile;	
else : 
	get_template_part('content-sorry');
endif; ?>

</div>

<?php
get_sidebar();

get_footer();
?>