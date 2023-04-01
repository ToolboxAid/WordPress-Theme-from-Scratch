<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function main_content( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('main_content', array(
		'title' => __('Main - Content', 'qbytesworld_WordPress'),
		'priority' => 165,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */
    /* Button hover color */
	$wp_customize->add_setting('main_content_H1_H6', array(
		'default' => '#aa0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_H1_H6_control', array(
		'label' => __('H1 - H6 Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_H1_H6',
        'description'=> __( 'Header colors', 'qbytesworld_WordPress' ),        
	) ) );


    /* Button hover color */
	$wp_customize->add_setting('main_content_paragraph', array(
		'default' => '#333333',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_paragraph_control', array(
		'label' => __('Paragraph Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_paragraph',
        'description'=> __( 'Paragraph color', 'qbytesworld_WordPress' ),        
	) ) );	


    /* Button & Link color */
	$wp_customize->add_setting('main_content_link_color', array(
		'default' => '#aa0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_link_color_control', array(
		'label' => __('Button & Link Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_link_color',
        'description'=> __( 'Button & Color link in article', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('main_content_link_color_hover', array(
		'default' => '#ff0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_link_color_hover_control', array(
		'label' => __('Button & Link Hover Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_link_color_hover',
        'description'=> __( 'Mouse Hover for Link & button color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Main background color */
	$wp_customize->add_setting('main_content_background', array(
		'default' => '#eeeeee',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_background_control', array(
		'label' => __('Main section Background Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_background',
        'description'=> __( 'Set the Main Content area background color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('main_article_background', array(
		'default' => '#cccccc',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_article_background_control', array(
		'label' => __('Article & Widget Background Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_article_background',
        'description'=> __( 'Set the Article & Widget background color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'main_content');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function main_content_css() { ?>

	<style type="text/css">
		article h1,
		article h2,
		article h3,
		article h4,
		article h5,
		article h6{
			color: <?php echo get_theme_mod('main_content_H1_H6'); ?>;
		}
		p{
			color: <?php echo get_theme_mod('main_content_paragraph'); ?>;
		}		
		a{
			color: <?php echo get_theme_mod('main_content_link_color'); ?>;
		}		
		a:hover{
			color: <?php echo get_theme_mod('main_content_link_color_hover'); ?>;
		}
		main {
			background-color: <?php echo get_theme_mod('main_content_background'); ?>; 
		}
		main article,
		div.sidebar-column .widget{
			background-color: <?php echo get_theme_mod('main_article_background'); ?>; 
		}

/* Main Content column */
main section .content-column {
}		

	</style>

<?php }
add_action('wp_head', 'main_content_css');

?>