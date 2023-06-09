<?php

///////////////////////////////////////////
/* Menu items setup for parent / child ? */
///////////////////////////////////////////

/* Get top ancestor ID */
function get_top_ancestor_id() {
	
	global $post;	
	if ($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];		
	}	
	return $post->ID;	
}

/* Does page have children? */
function has_children() {	
	global $post;	
	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);	
}

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_nav( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('header_nav', array(
		'title' => __('Header - Nav', 'qbytesworld_WordPress'),
		'priority' => 163,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    /* ************************************************************ */
    // Add font size setting and control
    $wp_customize->add_setting( 'header_nav_size', array(
        'default'    => '16',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_nav_size', array(
        'section'    => 'header_nav',
        'settings'   => 'header_nav_size',
        'label'      => __( 'Nav Font Size', 'qbytesworld_WordPress' ),
        'description' => __( 'Adjust the font size for title.', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '3',
        'max'    => '30',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Add spacing control
    $wp_customize->add_setting( 'header_nav_spacing', array(
        'default'    => '0',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_nav_spacing_control', array(
        'section'    => 'header_nav',
        'settings'   => 'header_nav_spacing',
        'label'      => __( 'Title Spacing', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the font space of the title', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '50',
        'step'   => '1',
        ),
     ) );

    /* Text color */
	$wp_customize->add_setting('header_nav_color', array(
		'default' => '#dddddd',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_color_control', array(
		'label' => __('Text Color', 'qbytesworld_WordPress'),
		'section' => 'header_nav',
		'settings' => 'header_nav_color',
        'description'=> __( 'Color for Nav Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Text hover color */
	$wp_customize->add_setting('header_nav_color_hover', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_color_hover_control', array(
		'label' => __('Text Hover Color', 'qbytesworld_WordPress'),
		'section' => 'header_nav',
		'settings' => 'header_nav_color_hover',
        'description'=> __( 'Mouse Nav Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* background color */
	$wp_customize->add_setting('header_nav_background', array(
		'default' => '#aa0000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_background_control', array(
		'label' => __('Background Color', 'qbytesworld_WordPress'),
		'section' => 'header_nav',
		'settings' => 'header_nav_background',
        'description'=> __( 'Set the Nav Background color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button Active color */
	$wp_customize->add_setting('header_nav_color_active', array(
		'default' => '#dddddd',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_color_active_control', array(
		'label' => __('Button Active Color', 'qbytesworld_WordPress'),
		'section' => 'header_nav',
		'settings' => 'header_nav_color_active',
        'description'=> __( 'Active Nav Item color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button background active color */
	$wp_customize->add_setting('header_nav_background_active', array(
		'default' => '#aa0000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_background_active_control', array(
		'label' => __('Button Active Background Color', 'qbytesworld_WordPress'),
		'section' => 'header_nav',
		'settings' => 'header_nav_background_active',
        'description'=> __( 'Active Nav Item background color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'header_nav');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_nav_css() { ?>

	<style type="text/css">
		/* Font Size & Spacing*/
		header nav a{		
            font-size: clamp(3px, 2vw, <?php echo get_theme_mod('header_nav_size') ?>px) !important;			
		}
		header nav li{		
            padding-left: <?php echo get_theme_mod('header_nav_spacing'); ?>px;
            padding-right: <?php echo get_theme_mod('header_nav_spacing'); ?>px;
		}		
		header nav a {
			color: <?php echo get_theme_mod('header_nav_color'); ?>;
		}
		header nav a:hover {
			color: <?php echo get_theme_mod('header_nav_color_hover'); ?>;
		}
		/* apply the effect on hover */
		ul#menu-header li.menu-item a:hover::before,
		ul#menu-header li.menu-item a:hover::after,
		ul#menu-header-links li.menu-item a:hover::before,
		ul#menu-header-links li.menu-item a:hover::after {
			background-color:  <?php echo get_theme_mod('header_nav_color_hover'); ?>;
		}	
		header nav li.current-menu-item:not(current-menu-item ),
		header nav li.current-page-ancestor,		
		header nav li.current_page_item {		
			background-color: <?php echo get_theme_mod('header_nav_background_active'); ?>;
		}

		header nav li.current-menu-item a:not(current-menu-item ),
		header nav li.current-page-ancestor a,
		header nav li.current_page_item a {		
			color: <?php echo get_theme_mod('header_nav_color_active'); ?>;
		}
		header div.site-nav {
			background-color: <?php echo get_theme_mod('header_nav_background'); ?>; 
            border-bottom: <?php echo get_theme_mod('header_order_border_size'); ?>px solid <?php echo get_theme_mod('header_order_border_color'); ?>  ;   
		}


		header li.menu-item:not(.current-menu-item) a:before,
		.hover-10:before {
			background-color:<?php echo get_theme_mod('header_nav_color_hover'); ?>;
		}
		header li.menu-item:not(.current-menu-item) a:after,
		.hover-10:after {
			background-color: <?php echo get_theme_mod('header_nav_color_hover'); ?>;
		}

		header li.menu-item:not(.current-menu-item):before,
		.hvr-bounce-to-top:before {
			background: <?php echo get_theme_mod('header_nav_background_active'); ?>; 
		}

	</style>

<?php }
add_action('wp_head', 'header_nav_css');

?>