	<?php
	/* Page is used for archives of type post */
	get_header();
	?>
	<div class="content-column"><?php
	debug_location("Archive");

		if (have_posts()) : ?>
			<article class="post">
				<h2><?php
					if ( is_category() ) {
						single_cat_title();
					} elseif ( is_tag() ) {
						single_tag_title();
					} elseif ( is_author() ) {
						the_post();
						echo 'Author Archives: ' . get_the_author();
						rewind_posts();
					} elseif ( is_day() ) {
						echo 'Daily Archives: ' . get_the_date();
					} elseif ( is_month() ) {
						echo 'Monthly Archives: ' . get_the_date('F Y');
					} elseif ( is_year() ) {
						echo 'Yearly Archives: ' . get_the_date('Y');
					} else {
						echo 'Archives:';
					}?>
				</h2>
			</article>

			<?php
			while (have_posts()) : the_post();
				get_template_part('content');
			endwhile;	
		else :
			get_template_part('content-sorry');
		endif; ?>
	</div>

	<?php get_template_part('content-sidebar'); ?>

	<?php	
	get_footer();
	?>