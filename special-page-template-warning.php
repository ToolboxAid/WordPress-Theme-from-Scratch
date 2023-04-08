<?php
/*
Template Name: Special Page Layout Warning
Template Post Type: page
*/

get_header();

debug_location("SPage");?>

<div class="content-column"><?php

	if (have_posts()) :
		while (have_posts()) : the_post(); ?>
			<!-- info-box -->
			<div class="info-box" style="background-color: white; border: 3px solid green; margin-bottom: 15px;">
				<p style="color: blue; font-size: 30px; font-style: italic; padding:10px; padding-left:30px;"><i class="fa fa-info-circle"></i> PAGE: pre article special template 'info'.</p>
			</div>
			<?php get_template_part('content'); ?>
			<div class="info-box" style="background-color: white; border: 3px solid green; margin-bottom: 15px;">
				<p style="color: blue; font-size: 30px; font-style: italic; padding:10px; padding-left:30px;"><i class="fa fa-info-circle"></i> PAGE: pre article special template 'info'.</p>
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
