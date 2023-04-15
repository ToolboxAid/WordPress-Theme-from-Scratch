<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function main_sidebar( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('main_sidebar', array(
		'title' => __('Main - Sidebar (incomplete)', 'qbytesworld_WordPress'),
		'priority' => 167,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    // Add checkbox to hide title & tagline 
    $wp_customize->add_setting( 'main_sidebar_sub_checkbox', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'main_sidebar_sub_checkbox', array(
        'label'    => __( 'Hide Title & Tagline', 'qbytesworld_WordPress' ),
        'section'  => 'main_sidebar',
        'settings' => 'main_sidebar_checkbox',
        'description' => __( 'True/False', 'qbytesworld_WordPress' ),        
        'type'     => 'checkbox',
    ) );	
	
    /* Button color */
	$wp_customize->add_setting('main_sidebar_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_sidebar_color_control', array(
		'label' => __('Button Color', 'qbytesworld_WordPress'),
		'section' => 'main_sidebar',
		'settings' => 'main_sidebar_color',
        'description'=> __( 'Color for Menu Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('main_sidebar_color_hover', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_sidebar_color_hover_control', array(
		'label' => __('Button Hover Color', 'qbytesworld_WordPress'),
		'section' => 'main_sidebar',
		'settings' => 'main_sidebar_color_hover',
        'description'=> __( 'Mouse Menu Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('main_sidebar_color_active', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_sidebar_color_active_control', array(
		'label' => __('Button Active Color', 'qbytesworld_WordPress'),
		'section' => 'main_sidebar',
		'settings' => 'main_sidebar_color_active',
        'description'=> __( 'Active Menu Item color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'main_sidebar');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function main_sidebar_css() { ?>

	<style type="text/css">

	</style>

<?php }
add_action('wp_head', 'main_sidebar_css');

?>