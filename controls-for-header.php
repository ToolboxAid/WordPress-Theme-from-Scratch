<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_options_body( $wp_customize ) {

    

	/* Create section */
	$wp_customize->add_section('options_header', array(
		'title' => __('Options - Header', 'qbytesworld_WordPress'),
		'priority' => 160,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */
  

    // Add a number control to the options_header section
$wp_customize->add_setting( 'header_font_size', array(
    'default'           => '0.0',
    'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_font_size', array(
    'label'    => __( 'Header Font Size', 'textdomain' ),
    'section'  => 'options_header',
    'settings' => 'header_font_size',
    'type'     => 'number',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 3,
        'step' => 0.1,
    ),
) ) );

// Add typography section to the Customizer
// Add font family setting and control
$wp_customize->add_setting( 'my_font_family', array(
    'default'    => 'Arial, sans-serif',
    'transport'  => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'my_font_family_control', array(
    'label'      => __( 'Font Family', 'qbytesworld_WordPress' ),
    'section'    => 'options_header',
    'settings'   => 'my_font_family',
    'type'       => 'select',
    'choices'    => array(
        'Arial, sans-serif' => __( 'Arial', 'qbytesworld_WordPress' ),
        'Times New Roman, serif' => __( 'Times New Roman', 'qbytesworld_WordPress' ),
        'Verdana, sans-serif' => __( 'Verdana', 'qbytesworld_WordPress' ),
    ),
) ) );

// Add font size setting and control
$wp_customize->add_setting( 'my_font_size', array(
    'default'    => '16',
    'transport'  => 'refresh',
) );
$wp_customize->add_control( 'my_font_size_control', array(
    'label'      => __( 'Font Size', 'qbytesworld_WordPress' ),
    'section'    => 'options_header',
    'settings'   => 'my_font_size',
    'type'       => 'number',
    'input_attrs' => array(
        'min'    => '12',
        'max'    => '24',
        'step'   => '1',
    ),
) );

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */    


    /* Add controls to section */
    // Add text control to the customizer
    $wp_customize->add_setting( 'mytheme_text_control', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );    
    $wp_customize->add_control( 'mytheme_text_control', array(
        'label' => __( 'Text Control', 'qbytesworld_WordPress' ),
        'section' => 'options_header',
        'type' => 'text',
        'priority' => 10,
    ) );

    /* Add slider control */
    $wp_customize->add_setting( 'slider_setting', array(
        'default'    => '50',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'slider_control', array(
        'label'      => __( 'Slider Label', 'qbytesworld_WordPress' ),
        'section'    => 'options_header',
        'settings'   => 'slider_setting',
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '100',
        'step'   => '1',
        ),
     ) );
    /* */
    /* */

    /* Add a Textarea control to the section */
    $wp_customize->add_setting( 'my_textarea_setting', array(
        'default'           => 'Fill me in',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'my_textarea_control', array(
        'label'      => __( 'My Textarea Control', 'qbytesworld_WordPress' ),
        'section'    => 'options_header',
        'settings'   => 'my_textarea_setting',
        'type'       => 'textarea',
        'description' => __( 'Enter some text here', 'qbytesworld_WordPress' ),
    ) ) );
    /* */

/* add checkbox to the section */
$wp_customize->add_setting( 'custom_checkbox', array(
    'default'   => false,
    'transport' => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_checkbox', array(
    'label'    => __( 'Custom Checkbox', 'qbytesworld_WordPress' ),
    'section'  => 'options_header',
    'settings' => 'custom_checkbox',
    'type'     => 'checkbox',
) ) );

/* Add select control */
$wp_customize->add_setting( 'my_select_setting', array(
    'default' => 'qbw1',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'my_select_control', array(
    'label' => __( 'My select Control', 'qbytesworld_WordPress' ),
    'section' => 'options_header',
    'settings' => 'my_select_setting',
    'type' => 'select',
    'choices' => array(
        'qbw1' => __( 'QBW 1', 'qbytesworld_WordPress' ),
        'qbw2' => __( 'QBW 2', 'qbytesworld_WordPress' ),
        'qbw3' => __( 'QBW 3', 'qbytesworld_WordPress' ),
    ),
) );


    /* Add radio control */
        $wp_customize->add_setting( 'my_radio_setting', array(
            'default' => 'option1',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
     
        $wp_customize->add_control( 'my_radio_control', array(
            'label' => __( 'My Radio Control', 'qbytesworld_WordPress' ),
            'section' => 'options_header',
            'settings' => 'my_radio_setting',
            'type' => 'radio',
            'choices' => array(
                'option1' => __( 'Option 1', 'qbytesworld_WordPress' ),
                'option2' => __( 'Option 2', 'qbytesworld_WordPress' ),
                'option3' => __( 'Option 3', 'qbytesworld_WordPress' ),
            ),
        ) );

    /* Add control for Header image */
    $wp_customize->add_setting('header_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image', array(
        'label' => __('Header Image', 'qbytesworld_WordPress'),
        'section' => 'options_header',
        'settings' => 'header_image'
    )));

    /*  Add control for Background Image */
    $wp_customize->add_setting('background_image', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'background_image', array(
        'label' => __('Background Image', 'qbytesworld_WordPress'),
        'section' => 'options_header',
        'settings' => 'background_image'
    )));

    /*  Add image control*/
    $wp_customize->add_setting('image_setting', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control', array(
        'label' => __('Select an image', 'qbytesworld_WordPress'),
        'section' => 'options_header',
        'settings' => 'image_setting',
    )));

    /* Body Gradient color start */
	$wp_customize->add_setting('qbw_backgroud_color_start', array(
		'default' => '#cccccc',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'qbw_backgroud_color_start', array(
		'label' => __('Background Color start', 'qbytesworld_WordPress'),
		'section' => 'options_header',
		'settings' => 'qbw_backgroud_color_start',
	) ) );
    
    /* Body Gradient color end */
	$wp_customize->add_setting('qbw_backgroud_color_end', array(
		'default' => '#666666',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'qbw_backgroud_color_end', array(
		'label' => __('Background Color end', 'qbytesworld_WordPress'),
		'section' => 'options_header',
		'settings' => 'qbw_backgroud_color_end',
	) ) );

    /* Link Color */
	$wp_customize->add_setting('qbw_link_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'qbw_link_color_control', array(
		'label' => __('Link Color', 'qbytesworld_WordPress'),
		'section' => 'options_header',
		'settings' => 'qbw_link_color',
	) ) );


    /* Button Color */
	$wp_customize->add_setting('qbw_btn_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'qbw_btn_color_control', array(
		'label' => __('Button Color', 'qbytesworld_WordPress'),
		'section' => 'options_header',
		'settings' => 'qbw_btn_color',
	) ) );

    /* Text Color */
	$wp_customize->add_setting('qbw_btn_text_color', array(
		'default' => '#ffffff',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'qbw_btn_text_color_control', array(
		'label' => __('Button Text Color', 'qbytesworld_WordPress'),
		'section' => 'options_header',
		'settings' => 'qbw_btn_text_color',
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('qbw_btn_hover_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'qbw_btn_hover_color_control', array(
		'label' => __('Button Hover Color', 'qbytesworld_WordPress'),
		'section' => 'options_header',
		'settings' => 'qbw_btn_hover_color',
	) ) );
}
add_action('customize_register', 'header_options_body');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_options_css() { ?>

	<style type="text/css">

		body
		{			
			/* background-image: linear-gradient(180deg, red, yellow); */
			
			background-image: linear-gradient(180deg, 
				<?php echo get_theme_mod('qbw_backgroud_color_start'); ?>,
				<?php echo get_theme_mod('qbw_backgroud_color_end'); ?> );

			background-color:<?php echo get_theme_mod('qbw_backgroud_color_start'); ?>;
		}

		a:link,
		a:visited {
			color: <?php echo get_theme_mod('qbw_link_color'); ?>;
		}


		div.header-search #searchsubmit,
		.site-header nav ul li.current-menu-item a:link,
		.site-header nav ul li.current-menu-item a:visited,
		.site-header nav ul li.current-page-ancestor a:link,
		.site-header nav ul li.current-page-ancestor a:visited {
/* */		background-color: <?php echo get_theme_mod('qbw_link_color'); ?>;
/* */		color: <?php echo get_theme_mod('qbw_btn_text_color'); ?>;
}

		.btn-a,
		.btn-a:link,
		.btn-a:visited,
		div.hd-search #searchsubmit {
/* */		background-color: <?php echo get_theme_mod('qbw_btn_color'); ?>;
		}

		.btn-a:hover,
		div.hd-search #searchsubmit:hover {
/* */		background-color: <?php echo get_theme_mod('qbw_btn_hover_color'); ?>;
		}

	</style>

<?php }
add_action('wp_head', 'header_options_css');


///////////////////////////////////////////
/* Menu items setup for parent / child ? */
///////////////////////////////////////////

/* Get top ancestor ID */
function get_top_ancestor_id() {
	
	global $post;	
	if ($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];		
	}	
	return $post->ID;	
}

/* Does page have children? */
function has_children() {	
	global $post;	
	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);	
}

?>