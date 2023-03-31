<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_breadcrumbs( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('header_breadcrumbs', array(
		'title' => __('Header - Bread Crumbs', 'qbytesworld_WordPress'),
		'priority' => 164,
	));

    /* ************************************************************ */
    /* ************************************************************ */
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
	$wp_customize->add_setting('header_breadcrumbs_color_active', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_breadcrumbs_color_active_control', array(
		'label' => __('Button Active Color', 'qbytesworld_WordPress'),
		'section' => 'header_breadcrumbs',
		'settings' => 'header_breadcrumbs_color_active',
        'description'=> __( 'Active Menu Item color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'header_breadcrumbs');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_breadcrumbs_css() { ?>

	<style type="text/css">

	</style>

<?php }
add_action('wp_head', 'header_breadcrumbs_css');

?>