<?php

 function display_breadcrumb() {
	  global $post;
	  $separator = ' <span class="breadcrumb-separator">/</span> ';
  
	  echo '<div class="breadcrumb">';
	  echo '<a href="' . home_url() . '">Home</a>' . $separator;
  
	  if ( is_archive() || is_search() ) {
		echo '<span class="breadcrumb-current">';
		echo get_the_archive_title();
		echo '</span>';
	  } elseif ( is_404() ) {
		echo '<span class="breadcrumb-current">Error 404</span>';
	  } elseif ( is_single() ) {
		$categories = get_the_category();
		$category   = $categories[0];
		$cat_id     = $category->cat_ID;
		$cat_link   = get_category_link( $cat_id );
		$cat_name   = $category->name;
		echo '<a href="' . $cat_link . '">' . $cat_name . '</a>' . $separator;
		echo '<span class="breadcrumb-current">';
		the_title();
		echo '</span>';
	  } elseif ( is_page() ) {
		$ancestors = get_post_ancestors( $post->ID );
		if ( $ancestors ) {
		  $ancestors = array_reverse( $ancestors );
		  foreach ( $ancestors as $ancestor ) {
			echo '<a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a>' . $separator;
		  }
		}
		echo '<span class="breadcrumb-current">';
		the_title();
		echo '</span>';
	  } elseif ( is_category() ) {
		$category = get_queried_object();
		$cat_id   = $category->cat_ID;
		$cat_link = get_category_link( $cat_id );
		$cat_name = $category->name;
		echo '<a href="' . home_url() . '">Blog</a>' . $separator;
		echo '<a href="' . $cat_link . '">' . $cat_name . '</a>';
	  } else {
		echo '<span class="breadcrumb-current">';
		the_title();
		echo '</span>';
	  }
	  echo '</div>';
	}
  
function get_header_breadcrumbs() {
	if ( get_theme_mod( 'mytheme_breadcrumbs_toggle', false ) )
	{
		if ( !is_home() && !is_front_page() ) {
			echo '<div id="crumb" class="center-breadcrumb innerA clear-formatting">';	
			echo '<nav aria-label="breadcrumb"><ol class="breadcrumb">';
			echo '<li class="breadcrumb-item"><a href="'.home_url('/').'">'.__('Home').'</a></li>';
			echo '<li class="breadcrumb-item"> > </li>';
			if ( is_category() || is_single() ) {
				echo '<li class="breadcrumb-item">';
				the_category(' </li><li class="breadcrumb-item"> ');
				if ( is_single() ) {
					echo '</li><li class="breadcrumb-item">';
					the_title();
					echo '</li>';
				}
			} elseif ( is_page() ) {
				echo '<li class="breadcrumb-item">';
				echo the_title();
				echo '</li>';
			}
			echo '</ol></nav>';
			echo '</div>';		
		} 
	} 
}

/**
 * Echo or return a formatted list of breadcrumbs.
 *
 * @param  array  $args An array of arguments to controll the output of the 
 *                      function.
 * @return string       The breadcrumb list.
 */
function get_breadcrumbs($args = array())
{
	if ( get_theme_mod( 'mytheme_breadcrumbs_toggle', false ) )
	{



		global $post;
	
		if (is_string($args)) {
			parse_str($args, $args);
		}
	
		// Set up defaults.
		$defaults = array(
			'separator'   => ' &gt; ',
			'linkFinal'   => false,
			'echo'        => true,
			'printOnHome' => true, 
			'before'      => '', 
			'after'       => '', 
		);
	
		// Merge the defaults with the parameters.
		$options = array_merge($defaults, (array)$args);
	
		// Initialise the trail with the current post.
		$trail = array($post);
		
		// Initialise the output.
		$output = '';
		
		$currentCategory = 0;
	
		if (is_front_page() == true && $options['printOnHome'] == false) {
			/**
			 * If this is the front page and the option to prevent priting on the
			 * home page is disabled then echo or return the empty string depending
			 * on the echo option.
			 */
			if ($options['echo'] == true) {
				echo $output;
			}
			return $output;
		}
		
		if (is_page()) {
			// If the current page is a page.
			$parent = $post;
			while ($parent->post_parent) {
				$parent = get_post($parent->post_parent);
				array_unshift($trail, $parent);
			}
		} elseif (is_category()) {
			// The current page is a category page.
			$trail = array();
			$currentCategory = get_query_var('cat');
			$category        = get_category($currentCategory);
			while ($category->category_parent > 0) {
				array_unshift($trail, $category);
				$category = get_category($category->category_parent);
			}
			// Add the final category to the trail.
			array_unshift($trail, $category);
		} else {
			// The current page will be a post or set of posts.
			$path = explode('/', $_SERVER['REQUEST_URI']);
			$path = array_filter($path);
			while (count($path) > 0) {
				$page = get_page_by_path(implode('/', $path));
				if ($page != NULL) {
					array_unshift($trail, $page);
				}
				array_pop($path);
			}
			
			if (count($trail) == 1) {
				// No pages found in path, try using categories.
				$category = get_the_category();
				$category = $category[0];
				while ($category->category_parent > 0) {
					array_unshift($trail, $category);
					$category = get_category($category->category_parent);
				}
				array_unshift($trail, $category);
			}
		}
	
		$show_on_front = get_option('show_on_front');
		if ('posts' == $show_on_front) {
			// The home page is a list of posts so just call it Home.
			$output .= '<li class="breadcrumb-item" id="breadcrumb-0"><a href="' . get_bloginfo('home') . '" title="Home">Home</a></li>' . "\n"; // home page link
		} else {
			// Otherwise the front page is a page so get the page name.
			$page_on_front = get_option('page_on_front');
			$home_page = get_post($page_on_front);
			$output .= '<li class="breadcrumb-item" id="breadcrumb-' . $home_page->ID . '"><a href="' . get_bloginfo('home') . '" title="' . $home_page->post_title . '">' . $home_page->post_title . '</a></li>' . "\n"; // home page link
			if ($trail[0]->ID == $page_on_front) {
				array_shift($trail);
			}
		}
	
		if (is_front_page() == false) {
			// If we aren't on the home page then construct the output. 
			foreach ($trail as $key => $page) {
				// Every item in the trail will be either a post/page object or a category.
				if (count($trail) - 1 == $key && $options['linkFinal'] == false) {
					// If we are on the last page and the option to link the final link is true.
					if (isset($page->post_title)) {
						$output .= '<li class="breadcrumb-item" id="breadcrumb-' . $page->ID . '">' . $options['separator'] . ' ' . $page->post_title . '</li>' . "\n";
					} elseif (isset($page->cat_name)) {
						$output .= '<li class="breadcrumb-item" id="breadcrumb-cat-' . $page->term_id . '">' . $options['separator'] . ' ' . $page->cat_name . '</li>' . "\n";
					}
				} else {
					// Create the link to the page or category
					if (isset($page->post_title)) {
						$output .= '<li class="breadcrumb-item" id="breadcrumb-' . $page->ID . '">' . $options['separator'] . '<a href="' . get_page_link($page->ID) . '" title="' . $page->post_title . '">' . $page->post_title . '</a></li>' . "\n";
					} elseif (isset($page->cat_name)) {
						$output .= '<li class="breadcrumb-item" id="breadcrumb-cat-' . $page->term_id . '">' . $options['separator'] . '<a href="' . get_category_link($page->term_id) . '" title="' . $page->cat_name . '">' . $page->cat_name . '</a></li>' . "\n";
					}
				}
			}
		}
		
		// Finish off the html of the ul
		$output = "<ul>\n" . $output . "</ul>\n";
		
		// Add other elements
		$output = $options['before'] . $output .  $options['after'];
		
		if ($options['echo'] == true) {
			// Print out the $output variable.
			echo '<div id="crumb" class="center-breadcrumb clear-formatting">';	
			echo '<nav aria-label="breadcrumb">';	// ol		
			echo $output;
			echo '</nav>';
			echo '</div>';			
		}
		// Return 
		return $output;
	}
}


/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_breadcrumbs( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('header_breadcrumbs', array(
		'title' => __('Header - Bread Crumbs', 'qbytesworld_WordPress'),
		'priority' => 165,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    // Add setting for breadcrumbs
    $wp_customize->add_setting( 'mytheme_breadcrumbs_toggle', array(
        'default'    => true,
        'transport'  => 'refresh',
     ) );
     
    // Add control for breadcrumbs
    $wp_customize->add_control( 'mytheme_breadcrumbs_toggle', array(
        'section'    => 'header_breadcrumbs',
        'settings'   => 'mytheme_breadcrumbs_toggle',
        'label'      => __( 'Display Breadcrumbs', 'mytheme' ),
        'description' => __( 'Toggle breadcrumbs on or off.', 'mytheme' ),
        'type'       => 'checkbox',
     ) );

    /* ************************************************************ */

    // Add checkbox to hide title & tagline 
    $wp_customize->add_setting( 'header_breadcrumbs_sub_checkbox', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'header_breadcrumbs_sub_checkbox', array(
        'label'    => __( 'Hide Title & Tagline', 'qbytesworld_WordPress' ),
        'section'  => 'header_breadcrumbs',
        'settings' => 'header_breadcrumbs_checkbox',
        'description' => __( 'True/False', 'qbytesworld_WordPress' ),        
        'type'     => 'checkbox',
    ) );	
	
    /* Button color */
	$wp_customize->add_setting('header_breadcrumbs_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_breadcrumbs_color_control', array(
		'label' => __('Button Color', 'qbytesworld_WordPress'),
		'section' => 'header_breadcrumbs',
		'settings' => 'header_breadcrumbs_color',
        'description'=> __( 'Color for Menu Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('header_breadcrumbs_color_hover', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_breadcrumbs_color_hover_control', array(
		'label' => __('Button Hover Color', 'qbytesworld_WordPress'),
		'section' => 'header_breadcrumbs',
		'settings' => 'header_breadcrumbs_color_hover',
        'description'=> __( 'Mouse Menu Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('header_breadcrumbs_background_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_breadcrumbs_background_color_control', array(
		'label' => __('Button Background Color', 'qbytesworld_WordPress'),
		'section' => 'header_breadcrumbs',
		'settings' => 'header_breadcrumbs_background_color',
        'description'=> __( 'Background Item color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'header_breadcrumbs');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_breadcrumbs_css() { ?>

	<style type="text/css">
		/* breadcrumbs */
		/* header div.clear-formatting * {
		all: unset;
		margin: 0;
		padding: 0;
		font-family: inherit;		
		} */

		div.header-content{
			background: <?php echo get_theme_mod('main_content_background_top'); ?>
		}
		header div.center-breadcrumb{
		background-color: <?php echo get_theme_mod('header_breadcrumbs_background_color'); ?>;	
		display: flex;
		margin-top:20px;
		width:70%;
		justify-content: center;
		align-items: center;
		border: 2px solid <?php echo get_theme_mod('header_order_border_color'); ?>;
		box-shadow: <?php echo get_theme_mod('main_content_dropshadow_offset'); ?>px <?php echo get_theme_mod('main_content_dropshadow_offset'); ?>px <?php echo get_theme_mod('main_article_dropshadow_size'); ?>px  <?php echo get_theme_mod('main_article_dropshadow');?>;

		border-radius: 15px;
		}
		header div.center-breadcrumb nav ul li{
			color: <?php echo get_theme_mod('header_breadcrumbs_color_hover'); ?>;
			display: inline;
		}
		li.breadcrumb-item{
			padding: 0;
		}
		li.breadcrumb-item a,
		nav.breadcrumb ul li.breadcrumb-item a{
			font-size: 18px !important;
			color: <?php echo get_theme_mod('header_breadcrumbs_color'); ?>;
		}
		li.breadcrumb-item a:hover,
		nav.breadcrumb ul li.breadcrumb-item a:hover{
			color: <?php echo get_theme_mod('header_breadcrumbs_color_hover'); ?>;
		}
	</style>

<?php }
add_action('wp_head', 'header_breadcrumbs_css');

?>