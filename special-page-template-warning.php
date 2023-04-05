<?php
/*
Template Name: Special Page Layout Warning
Template Post Type: page
*/

get_header();

debug_location("Special Ppage Layout Warning");?>

<div class="content-column"><?php

	if (have_posts()) :
		while (have_posts()) : the_post(); ?>
			<!-- info-box -->
			<div class="info-box">
				<p style="background-color: white; color: blue; font-size: 30px; font-style: italic; border: 5px solid green; margin: 10px;"><i class="fa fa-info"></i> PAGE: pre article special template 'info'.</p>
				<?php get_template_part('content'); ?>
				<p style="background-color: white; color: blue; font-size: 30px; font-style: italic; border: 5px solid green; margin: 10px;"><i class="fa fa-info-circle"></i> PAGE: post article special template 'info'.</p>
			</div><!-- /info-box --><?php
		endwhile;	
	else : 
		get_template_part('content-sorry');
	endif; ?>

</div>

<?php get_template_part('content-sidebar'); ?>

<?php	
get_footer();
?>
