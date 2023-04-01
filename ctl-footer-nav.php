<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function footer_nav( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('footer_nav', array(
		'title' => __('Footer - Nav (incomplete)', 'qbytesworld_WordPress'),
		'priority' => 167,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    // Add checkbox to hide title & tagline 
    $wp_customize->add_setting( 'footer_nav_sub_checkbox', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'footer_nav_sub_checkbox', array(
        'label'    => __( 'Hide Title & Tagline', 'qbytesworld_WordPress' ),
        'section'  => 'footer_nav',
        'settings' => 'footer_nav_checkbox',
        'description' => __( 'True/False', 'qbytesworld_WordPress' ),        
        'type'     => 'checkbox',
    ) );	
	
    /* Button color */
	$wp_customize->add_setting('footer_nav_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_nav_color_control', array(
		'label' => __('Button Color', 'qbytesworld_WordPress'),
		'section' => 'footer_nav',
		'settings' => 'footer_nav_color',
        'description'=> __( 'Color for Nav Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('footer_nav_color_hover', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_nav_color_hover_control', array(
		'label' => __('Button Hover Color', 'qbytesworld_WordPress'),
		'section' => 'footer_nav',
		'settings' => 'footer_nav_color_hover',
        'description'=> __( 'Mouse Nav Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('footer_nav_color_active', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_nav_color_active_control', array(
		'label' => __('Button Active Color', 'qbytesworld_WordPress'),
		'section' => 'footer_nav',
		'settings' => 'footer_nav_color_active',
        'description'=> __( 'Active Nav Item color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'footer_nav');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function footer_nav_css() { ?>

	<style type="text/css">
		footer {
			background-color: <?php echo get_theme_mod('header_nav_background'); ?>;
            border-top: <?php echo get_theme_mod('header_title_border_size'); ?>px solid <?php echo get_theme_mod('header_title_border_color'); ?>  ;   
		}

	</style>

<?php }
add_action('wp_head', 'footer_nav_css');

?>