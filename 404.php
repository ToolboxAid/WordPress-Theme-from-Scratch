	<?php
	/* Page is used for posts of type page */
	get_header();
	?>

	<div class="content-column"><?php
	
		debug_location("404");?>

		<article class="post page">

			<?php
			$the_slug = '404-page';
			$args = array(
			'name'        => $the_slug,
			'post_type'   => 'page',
			'post_status' => 'publish',
			'numberposts' => 1
			);

			$my_posts = get_posts($args);
			if( $my_posts ) {
					// echo 'ID on the first post found ' . $my_posts[0]->ID;
					// var_dump( $my_posts[0] );
					// echo "ID: " . $my_posts[0]->ID . "<br>";
					echo  "<h2>" . $my_posts[0]->post_title . "</h2>"; ?>
					<div id="content-container"><?php

					echo  $my_posts[0]->post_content;    
				} else { ?>
					<h2>404-default</h2>
					<div id="content-container">	<?				
			}?>

				<br/>
				<p>You <?php
				#some variables for the script to use
				#if you have some reason to change these, do.  but wordpress can handle it
				$adminemail = get_option('admin_email'); #the administrator email address, according to wordpress
				$website = get_bloginfo('url'); #gets your blog's url from wordpress
				$websitename = get_bloginfo('name'); #sets the blog's name, according to wordpress
				
				if (!isset($_SERVER['HTTP_REFERER'])) {
					#politely blames the user for all the problems they caused
						echo "tried going to "; #starts assembling an output paragraph
					$casemessage = "All is not lost!";
				} elseif (isset($_SERVER['HTTP_REFERER'])) {
					#this will help the user find what they want, and email me of a bad link
					echo "clicked a link to"; #now the message says You clicked a link to...
						#setup a message to be sent to me
					$failuremess = "A user tried to go to $website"
						.$_SERVER['REQUEST_URI']." and received a 404 (page not found) error. ";
					$failuremess .= "It wasn't their fault, so try fixing it.  
						They came from ".$_SERVER['HTTP_REFERER'];
					mail($adminemail, "Bad Link To ".$_SERVER['REQUEST_URI'],
						$failuremess, "From: $websitename <noreply@$website>"); #email you about problem
					$casemessage = "An administrator has been emailed 
						about this problem, too.";#set a friendly message
				}
				echo " '".$website.$_SERVER['REQUEST_URI']."' "; ?> 
					and it doesn't exist. <?php echo $casemessage; ?>  You can search for what you're looking for:
				<br/>
				<?php include(TEMPLATEPATH . "/searchform.php"); ?>
				</p>
				</div>
		</article>
	</div>

	<?php	
	get_sidebar();

	get_footer();
	?>