<?php
/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function main_content_code( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('main_content_code', array(
		'title' => __('Main - Code', 'qbytesworld_WordPress'),
		'priority' => 168,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

	    /* ************************************************************ */
    /* Code header color */
	$wp_customize->add_setting('main_content_code_color_header', array(
		'default' => '#aa0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_code_color_header_control', array(
		'label' => __('Header Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_code',
		'settings' => 'main_content_code_color_header',
        'description'=> __( 'Header color', 'qbytesworld_WordPress' ),        
	) ) );

	
    /* ************************************************************ */
    /* Code color */
	$wp_customize->add_setting('main_content_code_color', array(
		'default' => '#eeeeee',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_code_color_control', array(
		'label' => __('Header Code Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_code',
		'settings' => 'main_content_code_color',
        'description'=> __( 'Header font color', 'qbytesworld_WordPress' ),        
	) ) );

    /* ************************************************************ */
    /* Code hover color */
	$wp_customize->add_setting('main_content_code_color_hover', array(
		'default' => '#bbbbbb',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_code_color_hover_control', array(
		'label' => __('Header Code Hover Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_code',
		'settings' => 'main_content_code_color_hover',
        'description'=> __( 'Header code  Hover color', 'qbytesworld_WordPress' ),        
	) ) );


    /* ************************************************************ */
    /* Code line Number color */
	$wp_customize->add_setting('main_content_code_line_number_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_code_line_number_color_control', array(
		'label' => __('Line Number Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_code',
		'settings' => 'main_content_code_line_number_color',
        'description'=> __( 'Line Number color', 'qbytesworld_WordPress' ),        
	) ) );

	/* ************************************************************ */
    /* Font color */
	$wp_customize->add_setting('main_content_code_font_color', array(
		'default' => '#333333',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_code_font_color_control', array(
		'label' => __('Code font Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_code',
		'settings' => 'main_content_code_font_color',
        'description'=> __( 'Code font color', 'qbytesworld_WordPress' ),        
	) ) );

    /* ************************************************************ */
    /* Odd color */
	$wp_customize->add_setting('main_content_code_odd_color', array(
		'default' => '#ffdddd',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_code_odd_color_control', array(
		'label' => __('Odd Background Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_code',
		'settings' => 'main_content_code_odd_color',
        'description'=> __( 'Odd Background Item color', 'qbytesworld_WordPress' ),        
	) ) );
	
    /* ************************************************************ */
    /* Even color */
	$wp_customize->add_setting('main_content_code_even_color', array(
		'default' => '#ffeeee',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_code_even_color_control', array(
		'label' => __('Even Background Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_code',
		'settings' => 'main_content_code_even_color',
        'description'=> __( 'Even Background Item color', 'qbytesworld_WordPress' ),        
	) ) );	

}
add_action('customize_register', 'main_content_code');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function main_content_code_css() { ?>

	<style type="text/css">


/* colors color: */


.wp-modified-code a {
	color:  <?php echo get_theme_mod('main_content_code_color'); ?>;;
	background-color: <?php echo get_theme_mod('main_content_code_color_header'); ?>;
}
.wp-modified-code a:hover {
	color: <?php echo get_theme_mod('main_content_code_color_hover'); ?>;;
}
.wp-modified-code {
	border: 2px solid <?php echo get_theme_mod('main_content_code_color_header'); ?>;
}


span.line-number {
	color: <?php echo get_theme_mod('main_content_code_line_number_color'); ?>;
	border-right: 2px solid<?php echo get_theme_mod('main_content_code_color_header'); ?>;
}
/* pre.wp-modified-code {
	background-color: red;
} */
span.line-content{
	color: <?php echo get_theme_mod('main_content_code_font_color'); ?>;
}


p.line-wrap:nth-child(odd) {
	background-color: <?php echo get_theme_mod('main_content_code_odd_color'); ?>;
}
p.line-wrap:nth-child(even) {
	background-color: <?php echo get_theme_mod('main_content_code_even_color'); ?>;
}

	</style>

<?php }
add_action('wp_head', 'main_content_code_css');

?>



