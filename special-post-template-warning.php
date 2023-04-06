<?php
/*
Template Name: SINGLE: Custom Post Template
Template Post Type: post
*/

get_header();

debug_location("SPost");?>

<div class="content-column"><?php

	if (have_posts()) :
		while (have_posts()) : the_post(); ?>
			<!-- info-box -->
			<div class="info-box">
				<p style="background-color: white;color: red; font-size: 30px; font-style: italic; border: 5px solid orange; margin: 10px;margin-top: 0;"><i class="fa fa-exclamation-triangle"></i> POST: pre article special template 'warning'.</p>
				<?php get_template_part('content'); ?>
				<p style="background-color: white;color: red; font-size: 30px; font-style: italic; border: 5px solid orange; margin: 10px;margin-top: 0;"><i class="fa fa-exclamation-triangle"></i> POST: pre article special template 'warning'.</p>
			</div><!-- /info-box --><?php
		endwhile;	
	else : 
		get_template_part('content-sorry');
	endif; ?>

</div>

<?php
get_sidebar();

get_footer();
?>
