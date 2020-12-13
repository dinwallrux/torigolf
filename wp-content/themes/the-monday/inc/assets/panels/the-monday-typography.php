<?php
/**
 * Typography Settings Panel for customizer page
 *
 * @package The Monday
 */
 
 
 

add_action( 'customize_register', 'the_monday_typography_customize_register');
function the_monday_typography_customize_register( $wp_customize ) {

	
	// Add the typography panel.
	$wp_customize->add_panel( 
        'the_monday_typography', 
        array( 
            'title' => esc_html__( 'Typography', 'the-monday' ),
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'priority' => 7, 
             ) 
    );

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * Font Family dropdwon section
      */

	$wp_customize->add_section( 
        'the_monday_font_family', 
		array( 
            'title' => __( 'Font Family Options', 'the-monday' ),
            'panel' => 'the_monday_typography',
            'priority' => 3
             )
	);

	// Header typography
    $wp_customize->add_setting(
        'header_fonts',
        array(
            'default' => __( 'Open Sans,sans-serif', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
    );
	$wp_customize->add_control(
		new Typography_Dropdown(
			$wp_customize, 'header_fonts',
			array(
				'label'       => __( 'Header Fonts', 'the-monday' ),
				'description' => __( 'Choose a font for the heading H1, H2, H3, H4, H5, H6 text.', 'the-monday' ),
				'section'     => 'the_monday_font_family',
                'type'        => 'select',
                'priority'    => 3
			)
		)
	);
    
    // Body typography
    $wp_customize->add_setting(
        'body_fonts',
        array(
            'default' => __( 'Open Sans,sans-serif', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
    );
	$wp_customize->add_control(
		new Typography_Dropdown(
			$wp_customize, 'body_fonts',
			array(
				'label'       => __( 'Body Fonts', 'the-monday' ),
				'description' => __( 'Choose fonts for body text', 'the-monday' ),
				'section'     => 'the_monday_font_family',
                'type'        => 'select',
                'priority'    => 4
			)
		)
	);

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * Font size
      */
    
    $wp_customize->add_section( 
        'the_monday_font_size', 
		array( 
            'title' => __( 'Font Size', 'the-monday' ),
            'panel' => 'the_monday_typography',
            'priority' => 4
             )
	);
    
    //Home page section title   
    $wp_customize->add_setting(
        'home_section_title_size',
        array(
            'default' => '35',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'home_section_title_size',
        array(
            'type' => 'number',
            'priority' => 2,
            'label' => __( 'Section Title Size', 'the-monday' ),
            'description'   => __( 'Set the font size for section title.', 'the-monday' ),
            'section' => 'the_monday_font_size',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    //Body Font size   
    $wp_customize->add_setting(
        'body_font_size',
        array(
            'default' => '14',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'body_font_size',
        array(
            'type' => 'number',
            'priority' => 3,
            'label' => __( 'Body Font Size', 'the-monday' ),
            'description'   => __( 'Set the font size for body text.', 'the-monday' ),
            'section' => 'the_monday_font_size',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    //H1 Font size   
    $wp_customize->add_setting(
        'h1_font_size',
        array(
            'default' => '26',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'h1_font_size',
        array(
            'type' => 'number',
            'priority' => 4,
            'label' => __( 'H1 Font Size', 'the-monday' ),
            'description'   => __( 'Set the font size for H1 text.', 'the-monday' ),
            'section' => 'the_monday_font_size',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    //H2 Font size   
    $wp_customize->add_setting(
        'h2_font_size',
        array(
            'default' => '24',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'h2_font_size',
        array(
            'type' => 'number',
            'priority' => 5,
            'label' => __( 'H2 Font Size', 'the-monday' ),
            'description'   => __( 'Set the font size for H2 text.', 'the-monday' ),
            'section' => 'the_monday_font_size',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    //H3 Font size   
    $wp_customize->add_setting(
        'h3_font_size',
        array(
            'default' => '22',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'h3_font_size',
        array(
            'type' => 'number',
            'priority' => 6,
            'label' => __( 'H3 Font Size', 'the-monday' ),
            'description'   => __( 'Set the font size for H3 text.', 'the-monday' ),
            'section' => 'the_monday_font_size',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    //H4 Font size   
    $wp_customize->add_setting(
        'h4_font_size',
        array(
            'default' => '20',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'h4_font_size',
        array(
            'type' => 'number',
            'priority' => 7,
            'label' => __( 'H4 Font Size', 'the-monday' ),
            'description'   => __( 'Set the font size for H4 text.', 'the-monday' ),
            'section' => 'the_monday_font_size',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    //H5 Font size   
    $wp_customize->add_setting(
        'h5_font_size',
        array(
            'default' => '18',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'h5_font_size',
        array(
            'type' => 'number',
            'priority' => 8,
            'label' => __( 'H5 Font Size', 'the-monday' ),
            'description'   => __( 'Set the font size for H5 text.', 'the-monday' ),
            'section' => 'the_monday_font_size',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    //H6 Font size   
    $wp_customize->add_setting(
        'h6_font_size',
        array(
            'default' => '16',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'h5_font_size',
        array(
            'type' => 'number',
            'priority' => 9,
            'label' => __( 'H6 Font Size', 'the-monday' ),
            'description'   => __( 'Set the font size for H6 text.', 'the-monday' ),
            'section' => 'the_monday_font_size',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Font Color 
     */
     
    $wp_customize->add_section( 
        'the_monday_font_color', 
		array( 
            'title' => __( 'Font Color', 'the-monday' ),
            'description' => __( 'Select color for body, H1, H2, H3, H4, H5, H6 text.', 'the-monday' ),
            'panel' => 'the_monday_typography',
            'priority' => 4
             )
	); 
    
    /*//Header Text
    $wp_customize->add_setting(
        'header_font_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_font_color',
            array(
                'label' => __('Header Text Color', 'the-monday'),
                'section' => 'the_monday_font_color',
                'priority' => 3
            )
        )
    );*/
     
    //Body
    $wp_customize->add_setting(
        'body_font_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_font_color',
            array(
                'label' => __('Body Text Color', 'the-monday'),
                'section' => 'the_monday_font_color',
                'priority' => 4
            )
        )
    );
    
    /*
    //H1
    $wp_customize->add_setting(
        'h1_font_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'h1_font_color',
            array(
                'label' => __('H1 text', 'the-monday'),
                'section' => 'the_monday_font_color',
                'priority' => 4
            )
        )
    );
    
    //H2
    $wp_customize->add_setting(
        'h2_font_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'h2_font_color',
            array(
                'label' => __('H2 text', 'the-monday'),
                'section' => 'the_monday_font_color',
                'priority' => 5
            )
        )
    );
    
    //H3
    $wp_customize->add_setting(
        'h3_font_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'h3_font_color',
            array(
                'label' => __('H3 text', 'the-monday'),
                'section' => 'the_monday_font_color',
                'priority' => 6
            )
        )
    );
    
    //H4
    $wp_customize->add_setting(
        'h4_font_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'h4_font_color',
            array(
                'label' => __('H4 text', 'the-monday'),
                'section' => 'the_monday_font_color',
                'priority' => 7
            )
        )
    );
    
    //H5
    $wp_customize->add_setting(
        'h5_font_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'h5_font_color',
            array(
                'label' => __('H5 text', 'the-monday'),
                'section' => 'the_monday_font_color',
                'priority' => 8
            )
        )
    );
    
    //H6
    $wp_customize->add_setting(
        'h6_font_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'h6_font_color',
            array(
                'label' => __('H6 text', 'the-monday'),
                'section' => 'the_monday_font_color',
                'priority' => 9
            )
        )
    );
    */
    
}    