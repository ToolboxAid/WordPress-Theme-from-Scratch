<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_menu( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('header_menu', array(
		'title' => __('Header - Menu', 'qbytesworld_WordPress'),
		'priority' => 162,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    /* ************************************************************ */
    // Add font size setting and control
    $wp_customize->add_setting( 'header_menu_size', array(
        'default'    => '22',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_menu_size', array(
        'section'    => 'header_menu',
        'settings'   => 'header_menu_size',
        'label'      => __( 'Menu Font Size', 'qbytesworld_WordPress' ),
        'description' => __( 'Adjust the font size for title.', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '15',
        'max'    => '30',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Add spacing control
    $wp_customize->add_setting( 'header_menu_spacing', array(
        'default'    => '0',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_menu_spacing_control', array(
        'section'    => 'header_menu',
        'settings'   => 'header_menu_spacing',
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

    /* Button color */
	$wp_customize->add_setting('header_menu_color', array(
		'default' => '#dddddd',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_color_control', array(
		'label' => __('Button Color', 'qbytesworld_WordPress'),
		'section' => 'header_menu',
		'settings' => 'header_menu_color',
        'description'=> __( 'Color for Menu Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('header_menu_color_hover', array(
		'default' => '#ffffff',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_color_hover_control', array(
		'label' => __('Button Hover Color', 'qbytesworld_WordPress'),
		'section' => 'header_menu',
		'settings' => 'header_menu_color_hover',
        'description'=> __( 'Mouse Menu Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('header_menu_color_active', array(
		'default' => '#dddddd',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_color_active_control', array(
		'label' => __('Button Active Color', 'qbytesworld_WordPress'),
		'section' => 'header_menu',
		'settings' => 'header_menu_color_active',
        'description'=> __( 'Active Menu Item color', 'qbytesworld_WordPress' ),        
	) ) );
    /* Button hover color */
	$wp_customize->add_setting('header_menu_background_active', array(
		'default' => '#aa0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_background_active_control', array(
		'label' => __('Button Active Background Color', 'qbytesworld_WordPress'),
		'section' => 'header_menu',
		'settings' => 'header_menu_background_active',
        'description'=> __( 'Active Menu Item background color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'header_menu');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_menu_css() { ?>

	<style type="text/css">
		/* Font Size & Spacing*/
		header nav a{		
            font-size: <?php echo get_theme_mod('header_menu_size') ?>px;
		}
		header nav li{		
            padding-left: <?php echo get_theme_mod('header_menu_spacing'); ?>px;
            padding-right: <?php echo get_theme_mod('header_menu_spacing'); ?>px;
		}		
		header nav a {
			color: <?php echo get_theme_mod('header_menu_color'); ?>;
		}
		header nav a:hover {
			color: <?php echo get_theme_mod('header_menu_color_hover'); ?>;
		}
		/* Active page color: #eeeeee; */
		header nav li.current_page_item {		
			background-color: <?php echo get_theme_mod('header_menu_background_active'); ?>;
		}
		header nav li.current_page_item a {		
			color: <?php echo get_theme_mod('header_menu_color_active'); ?> !important;
		}
	</style>

<?php }
add_action('wp_head', 'header_menu_css');

?>