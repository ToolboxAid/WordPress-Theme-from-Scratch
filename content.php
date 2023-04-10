		
	<?php
		if ( is_search() OR is_archive() or is_home() ) { ?>
			<!-- post-thumbnail -->
			<?php if ( has_post_thumbnail() ) { ?>
			<article class="post image-container has-thumbnail">
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
				</div><!-- /post-thumbnail --> 
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php } else { ?>
			<article class="post image-container">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php } ?>
		<?php } else { ?>
			<!-- post-banner is_single() -->
			<?php if ( has_post_thumbnail() ) { ?>
			<article class="post image-banner has-thumbnail">
				<?php 
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id, 'banner-image')[0];
				?>
				<div class="post-banner bg-image-fill" style="background-image: url('<?php echo $image_url; ?>')">		
					<?php debug_location("______ - B");?>
				</div><!-- /post-banner -->
				<h2><?php the_title(); ?></h2>
			<?php } else { ?>
			<article class="post image-banner">
				<h2><?php the_title(); ?></h2>
			<?php } ?>
		<?php } ?>


		<p class="post-info">Posted <?php the_time('F jS, Y @ g:i A'); ?> by <?php
			if (get_the_author_meta('display_name')) {
				$display_name = get_the_author_meta('display_name');
				echo $display_name; 
			} else {
				$current_user = wp_get_current_user();
				$user_nickname = get_user_meta($current_user->ID, 'nickname', true);
				echo $user_nickname;
			}		

			?> | Categories: <?php
			$categories = get_the_category();
			$separator = ", ";
			$output = '';
			
			if ($categories) {				
				foreach ($categories as $category) {				
					$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;
				}				
				echo trim($output, $separator);
			}
			?>		
		</p><?php 
		
		if ( is_search() OR is_archive() ) { 
debug_location("______ - __1");?>
			<p>
				<?php echo get_the_excerpt(); 
				if (has_excerpt()){
					echo "[....]";
				}
				?>

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
			}
		} ?>


<!-- ====================================================== -->            
<!-- ====================================================== -->            
<!-- ====================================================== -->    
<style>
pre {
  white-space: pre;
  overflow-x: auto;
  line-height: 1.5;
}

.line-number {
  display: inline-block;
  width: 2em;
  text-align: right;
  margin-right: 0.5em;
  color: #999;
}
</style>

<script>
// Remove leading white space from code block
const codeBlock = document.querySelector('pre code');
codeBlock.innerHTML = codeBlock.innerHTML.replace(/^\s+/, '');

// Add line numbers to code block
const lines = codeBlock.innerHTML.split('\n');
const formattedLines = lines.map((line, index) => {
  const lineNumber = String(index + 1).padStart(3, '0');
  return `<span class="line-number">${lineNumber}</span><span>${line}</span>`;
});
codeBlock.innerHTML = formattedLines.join('\n');

// Add copy to clipboard functionality
const copyButton = document.getElementById('copy-btn');
copyButton.addEventListener('click', () => {
  const code = document.querySelector('pre code').innerText;
  navigator.clipboard.writeText(code);
});
</script>

<div>
	<pre id="code" class="wp-block-code">
		<code>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
	&lt;head&gt;
	&lt;title&gt;Example&lt;/title&gt;
	&lt;/head&gt;
	&lt;body&gt;
	&lt;h1&gt;Hello, world!&lt;/h1&gt;
	&lt;/body&gt;
&lt;/html&gt;
		</code>
	</pre>
<button id="copy-btn">Copy to Clipboard</button>
</div>

<!-- ====================================================== -->            
<!-- ====================================================== -->            
<!-- ====================================================== -->  


	</article>
