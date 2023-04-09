		
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
      .line-container {
        display: flex;
        align-items: center;
      }

      .line-number {
        display: inline-block;
        min-width: 30px;
        text-align: right;
        color: gray;
        margin-right: 10px;
      }

      .code-line {
        display: inline-block;
        white-space: pre-wrap;
      }

      .code {
        font-family: monospace;
        font-size: 14px;
      }
	  pre.wp-block-preformatted,
	  pre.wp-block-code{
		background-color: white;
		font-family: Courier, monospace;
		font-size: 10px;
		overflow-x: auto;
  		white-space: nowrap;
	}
    </style>
  </head>
  <body>
    <pre class="wp-block-code">
      <code>
        // Your code here
        &lt;!DOCTYPE html&gt; declares the document type and version of HTML being used in the document, in this case, HTML5.
        &lt;html&gt; is the root element of the HTML document.
        &lt;head&gt; contains metadata about the document, such as the title, character encoding, and any external resources used.
        &lt;title&gt; defines the title of the document that will be displayed in the browser tab or window.
        &lt;meta charset="UTF-8"&gt; sets the character encoding to UTF-8, which supports all characters in the Unicode standard.
      </code>
    </pre>

	<script>
  window.addEventListener('load', function() {
    const codeElements = document.querySelectorAll('pre code');
    
    codeElements.forEach(function(codeElement) {
      const codeLines = codeElement.textContent.trim().split('\n');
      codeElement.innerHTML = '';

      for (let i = 0; i < codeLines.length; i++) {
        const lineNumber = document.createElement('span');
        lineNumber.textContent = (i + 1) + '. ';
        lineNumber.classList.add('line-number');

        const codeLine = document.createElement('span');
        codeLine.textContent = codeLines[i].trim();
        codeLine.classList.add('code-line');

        const lineContainer = document.createElement('div');
        lineContainer.classList.add('line-container');
        lineContainer.appendChild(lineNumber);
        lineContainer.appendChild(codeLine);

        codeElement.appendChild(lineContainer);
      }
    });
  });
</script>

 

<!-- ====================================================== -->            
<!-- ====================================================== -->            
<!-- ====================================================== -->  


	</article>
