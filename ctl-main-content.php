<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function main_content( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('main_content', array(
		'title' => __('Main - Content (incomplete)', 'qbytesworld_WordPress'),
		'priority' => 165,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    // Add checkbox to hide title & tagline 
    $wp_customize->add_setting( 'main_content_sub_checkbox', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'main_content_sub_checkbox', array(
        'label'    => __( 'Hide Title & Tagline', 'qbytesworld_WordPress' ),
        'section'  => 'main_content',
        'settings' => 'main_content_checkbox',
        'description' => __( 'True/False', 'qbytesworld_WordPress' ),        
        'type'     => 'checkbox',
    ) );	
	
    /* Button color */
	$wp_customize->add_setting('main_content_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_color_control', array(
		'label' => __('Button Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_color',
        'description'=> __( 'Color for Menu Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('main_content_color_hover', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_color_hover_control', array(
		'label' => __('Button Hover Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_color_hover',
        'description'=> __( 'Mouse Menu Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('main_content_color_active', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_color_active_control', array(
		'label' => __('Button Active Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_color_active',
        'description'=> __( 'Active Menu Item color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'main_content');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function main_content_css() { ?>

	<style type="text/css">

	</style>

<?php }
add_action('wp_head', 'main_content_css');

?>