<?php
/*
Template Name: Custom Post Template
Template Post Type: post
*/

get_header();

debug_location("SPost");?>

<div class="content-column"><?php

	if (have_posts()) :
		while (have_posts()) : the_post(); ?>
			<!-- info-box -->
			
			<div class="info-box" style="background-color: white; border: 3px solid red; margin-bottom: 15px; width:92%;">
				<p style="color: red; font-size: 30px; font-style: italic; padding:10px; padding-left:30px;"><i class="fa fa-exclamation-triangle"></i> POST: pre article special template 'warning'.</p></p>
			</div>
			<?php get_template_part('content'); ?>
			<div class="info-box" style="background-color: white; border: 3px solid red; margin-bottom: 15px; width:92%;">
				<p style="color: red; font-size: 30px; font-style: italic; padding:10px; padding-left:30px;"><i class="fa fa-exclamation-triangle"></i> POST: pre article special template 'warning'.</p></p>
			</div><!-- /info-box --><?php
		
			get_template_part( 'content-comments' );		
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
