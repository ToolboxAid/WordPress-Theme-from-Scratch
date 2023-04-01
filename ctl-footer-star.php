<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function footer_star( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('footer_star', array(
		'title' => __('Footer - Line (incomplete)', 'qbytesworld_WordPress'),
		'priority' => 168,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    // Add checkbox to hide title & tagline 
    $wp_customize->add_setting( 'footer_star_sub_checkbox', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'footer_star_sub_checkbox', array(
        'label'    => __( 'Hide Title & Tagline', 'qbytesworld_WordPress' ),
        'section'  => 'footer_star',
        'settings' => 'footer_star_checkbox',
        'description' => __( 'True/False', 'qbytesworld_WordPress' ),        
        'type'     => 'checkbox',
    ) );	
	
    /* Button color */
	$wp_customize->add_setting('footer_star_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_star_color_control', array(
		'label' => __('Button Color', 'qbytesworld_WordPress'),
		'section' => 'footer_star',
		'settings' => 'footer_star_color',
        'description'=> __( 'Color for Menu Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('footer_star_color_hover', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_star_color_hover_control', array(
		'label' => __('Button Hover Color', 'qbytesworld_WordPress'),
		'section' => 'footer_star',
		'settings' => 'footer_star_color_hover',
        'description'=> __( 'Mouse Menu Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('footer_star_color_active', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_star_color_active_control', array(
		'label' => __('Button Active Color', 'qbytesworld_WordPress'),
		'section' => 'footer_star',
		'settings' => 'footer_star_color_active',
        'description'=> __( 'Active Menu Item color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'footer_star');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function footer_star_css() { ?>

	<style type="text/css">
		footer .star{
			font-size: 55px;
			color: yellow;

			margin: 0px;
			display: flex; 
			align-items: center;	
		}
		footer .star i{
			padding-left: 30px;		
			padding-right: 30px;		
		}		
		footer .star hr{
			height: 3px; 
			background-color: yellow;

			width: 50%; 
		}
	</style>

<?php }
add_action('wp_head', 'footer_star_css');

?>