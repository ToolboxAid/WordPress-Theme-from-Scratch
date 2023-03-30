<?php

class PersonalTypography {
    private $section;
    private $title;
    private $id_prefix;

    public function __construct($section, $title, $priority) {
        $this->section = $section;
        $this->title = $title;
        $this->priority = $priority;
        $this->id_prefix = str_replace('_', '-', $this->section) . '-';
        
        add_action( 'customize_register', array( $this, 'register_controls' ) );
    }

    public function register_controls( $wp_customize ) {
        // Add section for this instance
        $wp_customize->add_section( $this->section, array(
            'title'    => $this->title,
            'priority' => $this->priority, //30,
        ) );
        
        // Add name control
        $wp_customize->add_setting( $this->id_prefix . 'name', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) ); 
        $wp_customize->add_control( $this->id_prefix . 'name', array(
            'label'    => __( 'Name', 'mytheme' ),
            'section'  => $this->section,
            'type'     => 'text',
        ) );
 

        // Add font size control
        $wp_customize->add_setting( $this->id_prefix . 'font_size', array(
            'default'           => '16',
            'sanitize_callback' => 'absint',
        ) ); 
        $wp_customize->add_control( $this->id_prefix . 'font_size', array(
            'label'    => __( 'Font Size', 'mytheme' ),
            'section'  => $this->section,
            'type'     => 'number',
            'input_attrs' => array(
                'min'   => 10,
                'max'   => 30,
                'step'  => 1,
            ),
        ) );
 


        // Add font spacing control
        $wp_customize->add_setting( $this->id_prefix . 'font_spacing', array(
            'default'           => '1',
            'sanitize_callback' => 'absint',
        ) );
 
        $wp_customize->add_control( $this->id_prefix . 'font_spacing', array(
            'label'    => __( 'Font Spacing', 'mytheme' ),
            'section'  => $this->section,
            'type'     => 'number',
            'input_attrs' => array(
                'min'   => 0,
                'max'   => 10,
                'step'  => 0.1,
            ),
        ));         
    }
}

?>