<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function main_content( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('main_content', array(
		'title' => __('Main - Content', 'qbytesworld_WordPress'),
		'priority' => 166,
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

    /* Button active color */
	$wp_customize->add_setting('main_content_link_color_active', array(
		'default' => '#ff0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_link_color_active_control', array(
		'label' => __('Button & Link Active Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_link_color_active',
        'description'=> __( 'Active for Link & button color', 'qbytesworld_WordPress' ),        
	) ) );	

    /* Button article background color */
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

	/* Main background color */
	$wp_customize->add_setting('main_content_background_top', array(
		'default' => '#888888',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_background_top_control', array(
		'label' => __('Main section Background Color Top', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_background_top',
		'description'=> __( 'Set the Main Content area background color - top', 'qbytesworld_WordPress' ),        
	) ) );

	/* Main background color2 */
	$wp_customize->add_setting('main_content_background_bottom', array(
		'default' => '#eeeeee',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_background_bottom_control', array(
		'label' => __('Main section Background Color Bottom', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_content_background_bottom',
        'description'=> __( 'Set the Main Content area background color-bottom', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('main_article_dropshadow', array(
		'default' => '#aa0001',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_article_dropshadow_control', array(
		'label' => __('Article & Widget Drop Shadow Color', 'qbytesworld_WordPress'),
		'section' => 'main_content',
		'settings' => 'main_article_dropshadow',
        'description'=> __( 'Set the Article & Widget background color', 'qbytesworld_WordPress' ),        
	) ) );

	// Add dropshadow size
	$wp_customize->add_setting( 'main_article_dropshadow_size', array(
		'default'    => '3',
		'transport'  => 'refresh',
		) );
	$wp_customize->add_control( 'main_article_dropshadow_size_control', array(
		'section'    => 'main_content',
		'settings'   => 'main_article_dropshadow_size',
		'label'      => __( 'Drop Shadow size', 'qbytesworld_WordPress' ),
		'description'=> __( 'Adjust the dropshadow size', 'qbytesworld_WordPress' ),        
		'type'       => 'range',
		'priority'   => 10,
		'input_attrs' => array(
		'min'    => '0',
		'max'    => '40',
		'step'   => '1',
		),
		) );

	// Add dropshadow offset
	$wp_customize->add_setting( 'main_content_dropshadow_offset', array(
		'default'    => '10',
		'transport'  => 'refresh',
		) );
	$wp_customize->add_control( 'main_content_dropshadow_offset_control', array(
		'section'    => 'main_content',
		'settings'   => 'main_content_dropshadow_offset',
		'label'      => __( 'Drop Shadow offset', 'qbytesworld_WordPress' ),
		'description'=> __( 'Adjust the dropshadow offset', 'qbytesworld_WordPress' ),        
		'type'       => 'range',
		'priority'   => 10,
		'input_attrs' => array(
		'min'    => '0',
		'max'    => '20',
		'step'   => '1',
		),
		) );


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

		li.current-cat a,
		li.current_page_item a{
			color: <?php echo get_theme_mod('main_content_link_color_active'); ?>;
		}

		main {
			background: linear-gradient(to bottom, <?php echo get_theme_mod('main_content_background_top'); ?>, <?php echo get_theme_mod('main_content_background_bottom'); ?>); height: 100%;			
		}
		div.side-column div.widget-item,
		main article{
			background-color: <?php echo get_theme_mod('main_article_background'); ?>; 
		}

		/* Main Content column */
		main section div.side-column .widget-item,		
		main section div article {
			box-shadow: <?php echo get_theme_mod('main_content_dropshadow_offset'); ?>px <?php echo get_theme_mod('main_content_dropshadow_offset'); ?>px <?php echo get_theme_mod('main_article_dropshadow_size'); ?>px  <?php echo get_theme_mod('main_article_dropshadow');?>;
		}	

	</style>

<?php }
add_action('wp_head', 'main_content_css');

?>