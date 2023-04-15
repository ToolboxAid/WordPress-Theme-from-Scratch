<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_menu_sub( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('header_menu_sub', array(
		'title' => __('Header - Sub-Menu (incomplete)', 'qbytesworld_WordPress'),
		'priority' => 164,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    // Add checkbox to hide title & tagline 
    $wp_customize->add_setting( 'header_menu_sub_sub_checkbox', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'header_menu_sub_sub_checkbox', array(
        'label'    => __( 'Hide Title & Tagline', 'qbytesworld_WordPress' ),
        'section'  => 'header_menu_sub',
        'settings' => 'header_menu_sub_checkbox',
        'description' => __( 'True/False', 'qbytesworld_WordPress' ),        
        'type'     => 'checkbox',
    ) );	
	
    /* Button color */
	$wp_customize->add_setting('header_menu_sub_color', array(
		'default' => '#004C87',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_sub_color_control', array(
		'label' => __('Button Color', 'qbytesworld_WordPress'),
		'section' => 'header_menu_sub',
		'settings' => 'header_menu_sub_color',
        'description'=> __( 'Color for Menu Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('header_menu_sub_color_hover', array(
		'default' => '#004C87',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_sub_color_hover_control', array(
		'label' => __('Button Hover Color', 'qbytesworld_WordPress'),
		'section' => 'header_menu_sub',
		'settings' => 'header_menu_sub_color_hover',
        'description'=> __( 'Mouse Menu Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('header_menu_sub_color_active', array(
		'default' => '#004C87',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_sub_color_active_control', array(
		'label' => __('Button Active Color', 'qbytesworld_WordPress'),
		'section' => 'header_menu_sub',
		'settings' => 'header_menu_sub_color_active',
        'description'=> __( 'Active Menu Item color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'header_menu_sub');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_menu_sub_css() { ?>

	<style type="text/css">

	</style>

<?php }
add_action('wp_head', 'header_menu_sub_css');

?>