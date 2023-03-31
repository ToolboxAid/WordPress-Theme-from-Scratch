<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function footer_copyright( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('footer_copyright', array(
		'title' => __('Footer - copyright (incomplete)', 'qbytesworld_WordPress'),
		'priority' => 168,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    // Add checkbox to hide title & tagline 
    $wp_customize->add_setting( 'footer_copyright_sub_checkbox', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'footer_copyright_sub_checkbox', array(
        'label'    => __( 'Hide Title & Tagline', 'qbytesworld_WordPress' ),
        'section'  => 'footer_copyright',
        'settings' => 'footer_copyright_checkbox',
        'description' => __( 'True/False', 'qbytesworld_WordPress' ),        
        'type'     => 'checkbox',
    ) );	
	
    /* Button color */
	$wp_customize->add_setting('footer_copyright_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_color_control', array(
		'label' => __('Button Color', 'qbytesworld_WordPress'),
		'section' => 'footer_copyright',
		'settings' => 'footer_copyright_color',
        'description'=> __( 'Color for Menu Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('footer_copyright_color_hover', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_color_hover_control', array(
		'label' => __('Button Hover Color', 'qbytesworld_WordPress'),
		'section' => 'footer_copyright',
		'settings' => 'footer_copyright_color_hover',
        'description'=> __( 'Mouse Menu Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('footer_copyright_color_active', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_color_active_control', array(
		'label' => __('Button Active Color', 'qbytesworld_WordPress'),
		'section' => 'footer_copyright',
		'settings' => 'footer_copyright_color_active',
        'description'=> __( 'Active Menu Item color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'footer_copyright');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function footer_copyright_css() { ?>

	<style type="text/css">

	</style>

<?php }
add_action('wp_head', 'footer_copyright_css');

?>