<?php
/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function main_content_pagination( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('main_content_pagination', array(
		'title' => __('Main - Pagination', 'qbytesworld_WordPress'),
		'priority' => 167,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */
	
    /* ************************************************************ */
    /* Pagination color */
	$wp_customize->add_setting('main_content_pagination_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_pagination_color_control', array(
		'label' => __('Pagination Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_pagination',
		'settings' => 'main_content_pagination_color',
        'description'=> __( 'Color for Pagination Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* ************************************************************ */
    /* Pagination hover color */
	$wp_customize->add_setting('main_content_pagination_color_hover', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_pagination_color_hover_control', array(
		'label' => __('Pagination Hover Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_pagination',
		'settings' => 'main_content_pagination_color_hover',
        'description'=> __( 'Pagination Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* ************************************************************ */
    /* Pagination active color */
	$wp_customize->add_setting('main_content_pagination_color_active', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_pagination_color_active_control', array(
		'label' => __('Pagination Active Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_pagination',
		'settings' => 'main_content_pagination_color_active',
        'description'=> __( 'Pagination Item Active color', 'qbytesworld_WordPress' ),        
	) ) );

    /* ************************************************************ */
    /* Pagination background color */
	$wp_customize->add_setting('main_content_pagination_background_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_pagination_background_color_control', array(
		'label' => __('Pagination Background Color', 'qbytesworld_WordPress'),
		'section' => 'main_content_pagination',
		'settings' => 'main_content_pagination_background_color',
        'description'=> __( 'Background Item color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'main_content_pagination');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function main_content_pagination_css() { ?>

	<style type="text/css">

div.nav-links a,
a.page-numbers {
	color:  <?php echo get_theme_mod('main_content_pagination_color'); ?>;
}
div.nav-links a:hover,
a.page-numbers:hover {
	color:  <?php echo get_theme_mod('main_content_pagination_color_hover'); ?>;
}
span.page-numbers.current {
	color:  <?php echo get_theme_mod('main_content_pagination_color_active'); ?>;
}
nav.navigation.post-navigation{	
	background-color: <?php echo get_theme_mod('main_content_pagination_background_color'); ?>;	

	
	border: <?php echo get_theme_mod('main_content_border_size'); ?>px solid <?php echo get_theme_mod('header_order_border_color'); ?>;
	box-shadow: <?php echo get_theme_mod('main_content_dropshadow_offset'); ?>px 
				<?php echo get_theme_mod('main_content_dropshadow_offset'); ?>px
				<?php echo get_theme_mod('main_article_dropshadow_size'); ?>px
				<?php echo get_theme_mod('main_article_dropshadow');?>;
}
	</style>

<?php }
add_action('wp_head', 'main_content_pagination_css');

?>