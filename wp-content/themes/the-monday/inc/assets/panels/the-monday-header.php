<?php
/**
 * Header Settings Panel for customizer page
 *
 * @package The Monday
 */
 
add_action( 'customize_register', 'the_monday_header_settings_panel' );

function the_monday_header_settings_panel( $wp_customize ) {
    
    $wp_customize->remove_control( 'display_header_text' );
    
    $wp_customize->add_panel( 
        'the_monday_header_panel', 
            array(
                'priority'       => 4,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Header Settings', 'the-monday'),
            ) 
    );
     
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Header Type section 
     */
    $wp_customize->add_section(
        'the_monday_header_type',
        array(
            'title'         => __('Header type', 'the-monday'),
            'priority'      => 10,
            'panel'         => 'the_monday_header_panel', 
            'description'   => __('You can select your header type from here. After that, continue below to the next two tabs (Header Slider and Header Image) and configure them.', 'the-monday'),
        )
    );
    //Front page
    $wp_customize->add_setting(
        'front_header_type',
        array(
            'default'           => 'image',
            'sanitize_callback' => 'the_monday_sanitize_layout',
        )
    );
    $wp_customize->add_control(
        'front_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Front page header type', 'the-monday'),
            'section'     => 'the_monday_header_type',
            'description' => __('Select the header type for your front page', 'the-monday'),
            'choices' => array(
                'slider'    => __('Full screen slider', 'the-monday'),
                'image'     => __('Image', 'the-monday'),
                'nothing'   => __('No header (only menu)', 'the-monday')
            ),
        )
    );
    
    // Whole Site except home page
    $wp_customize->add_setting(
        'inner_header_type',
        array(
            'default'           => 'image',
            'sanitize_callback' => 'the_monday_sanitize_inner_layout',
        )
    );
    $wp_customize->add_control(
        'inner_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site header type', 'the-monday'),
            'section'     => 'the_monday_header_type',
            'description' => __('Select the header type for all pages except the front page', 'the-monday'),
            'choices' => array(
                'image'     => __('Image', 'the-monday'),
                'nothing'   => __('No header (only menu)', 'the-monday')
            ),
        )
    );  
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Header slider section
     */
     
    $wp_customize->add_section(
        'the_monday_header_slider',
        array(
            'title'         => __('Header Slider', 'the-monday'),
            'description'   => __('You can select posts from category to use as header slider', 'the-monday'),
            'priority'      => 11,
            'panel'         => 'the_monday_header_panel',
        )
    );
    
    $wp_customize->add_setting(
        'slider_category',
        array(
            'default' => '0',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text'
        )
    );
    $wp_customize->add_control( 
        new WP_Customize_Category_Control( 
        $wp_customize,
        'slider_category', 
        array(
            'label' => __( "Slider's Category", 'the-monday' ),
            'description' => __( "Select cateogry for Header slider", "the-monday" ),
            'section' => 'the_monday_header_slider',
            'priority' => 5
            )
        )
    );
    
    //slider button Text
    $wp_customize->add_setting(
        'slider_button_text', 
            array(
                'default' => __( "Let's Go", 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'slider_button_text',
            array(
            'type' => 'text',
            'label' => 'Slider Button Text',
            'section' => 'the_monday_header_slider',
            'priority' => 6
            )
    );
    
    //Speed for image slider
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default' => '2000',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'slider_speed',
        array(
            'type' => 'number',
            'priority' => 7,            
            'label' => __( 'Slider speed', 'the-monday' ),
            'section' => 'the_monday_header_slider',            
            'description'   => __( 'Slider speed in miliseconds. Use 0 to disable [default: 2000]', 'the-monday' ),
            'input_attrs' => array(
                'min'   => 100,
                'max'   => 10000,
                'step'  => 50,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),
        )
    );
    
    /*// Speed for text slider
    $wp_customize->add_setting(
        'textslider_speed',
        array(
            'default' => '2000',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'textslider_speed',
        array(
            'type' => 'number',
            'priority' => 8,
            'label' => __( 'Text slider speed', 'the-monday' ),
            'section' => 'the_monday_header_slider',
            'description'   => __( 'Text slider speed in miliseconds [default: 2000]', 'the-monday' ),
            'input_attrs' => array(
                'min'   => 100,
                'max'   => 10000,
                'step'  => 50,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),
        )
    );*/
    
    /*//Stop text to slide
    $wp_customize->add_setting(
        'textslider_slide',
        array(
            'sanitize_callback' => 'the_monday_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'textslider_slide',
        array(
            'type'      => 'checkbox',
            'label'     => __( 'Stop the text slider?', 'the-monday' ),
            'section'   => 'the_monday_header_slider',
            'priority'  => 9,
        )
    );*/

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
   /**
    * Select Front Page Header image section
    */
      
    $wp_customize->add_section(
        'the_monday_front_header_image_section',
        array(
            'title'         => __('Front Header Image', 'the-monday'),
            //'description'   => __('You can select posts from category to use as header slider', 'the-monday'),
            'priority'      => 12,
            'panel'         => 'the_monday_header_panel',
        )
    );
    
    // Front page header image settings
    $wp_customize->add_setting(
        'front_header_image',
        array(
            'default' => THE_MONDAY_IMAGES_URL . '/front-header.jpg',
            'sanitize_callback' => 'esc_url',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'front_header_image',
            array(
               'label'          => __( 'Upload your Header Image', 'the-monday' ),
               'section'        => 'the_monday_front_header_image_section',
               'priority'       => 4,
            )
        )
    );
    $wp_customize->add_setting(
        'front_header_bg_size',
        array(
            'default' =>'cover',
            'sanitize_callback' => 'the_monday_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'front_header_bg_size',
        array(
            'type' => 'radio',
            'priority'    => 5,
            'label' => __( 'Header background size', 'the-monday' ),
            'section' => 'the_monday_front_header_image_section',
            'choices' => array(
                'cover'     => __( 'Cover', 'the-monday' ),
                'contain'   => __( 'Contain', 'the-monday' ),
            ),
        )
    );
    
    //Header height
    $wp_customize->add_setting(
        'front_header_height',
        array(
            'default' => '1000',
            'sanitize_callback' => 'the_monday_sanitize_number',            
        )       
    );
    $wp_customize->add_control( 'front_header_height', array(
        'type'        => 'number',
        'priority'    => 6,
        'section'     => 'the_monday_front_header_image_section',
        'label'       => __( 'Header height [default: 1000px]', 'the-monday' ),
        'input_attrs' => array(
            'min'   => 250,
            'max'   => 1100,
            'step'  => 5,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    
    //Disable overlay
    $wp_customize->add_setting(
        'front_hide_overlay',
        array(
            'sanitize_callback' => 'the_monday_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'front_hide_overlay',
        array(
            'type'      => 'checkbox',
            'label'     => __( 'Disable the overlay?', 'the-monday' ),
            'section'   => 'the_monday_front_header_image_section',
            'priority'  => 7,
        )
    );

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
   /**
    * Select Inner Pages Header image section
    */
      
    $wp_customize->add_section(
        'the_monday_inner_header_image_section',
        array(
            'title'         => __('Inner Pages Header Image', 'the-monday'),
            //'description'   => __('You can select posts from category to use as header slider', 'the-monday'),
            'priority'      => 13,
            'panel'         => 'the_monday_header_panel',
        )
    );
    
    // Inner page header image settings
    $wp_customize->add_setting(
        'inner_header_image',
        array(
            'default' => THE_MONDAY_IMAGES_URL . '/inner-header.jpg',
            'sanitize_callback' => 'esc_url',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'inner_header_image',
            array(
               'label'          => __( 'Upload your Header Image', 'the-monday' ),
               'section'        => 'the_monday_inner_header_image_section',
               'priority'       => 4,
            )
        )
    );
    $wp_customize->add_setting(
        'inner_header_bg_size',
        array(
            'default' =>'cover',
            'sanitize_callback' => 'the_monday_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'inner_header_bg_size',
        array(
            'type' => 'radio',
            'priority'    => 5,
            'label' => __( 'Header background size', 'the-monday' ),
            'section' => 'the_monday_inner_header_image_section',
            'choices' => array(
                'cover'     => __( 'Cover', 'the-monday' ),
                'contain'   => __( 'Contain', 'the-monday' ),
            ),
        )
    );
    
    //Header height
    $wp_customize->add_setting(
        'inner_header_height',
        array(
            'default' => '316',
            'sanitize_callback' => 'the_monday_sanitize_number',            
        )       
    );
    $wp_customize->add_control( 
        'inner_header_height', 
        array(
            'type'        => 'number',
            'priority'    => 6,
            'section'     => 'the_monday_inner_header_image_section',
            'label'       => __( 'Header height [default: 316px]', 'the-monday' ),
            'input_attrs' => array(
                'min'   => 250,
                'max'   => 500,
                'step'  => 5,
                'style' => 'margin-bottom: 15px; padding: 15px;',
                ),
            ) 
    );
    
    //Disable overlay
    $wp_customize->add_setting(
        'inner_hide_overlay',
        array(
            'sanitize_callback' => 'the_monday_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'inner_hide_overlay',
        array(
            'type'      => 'checkbox',
            'label'     => __( 'Disable the overlay?', 'the-monday' ),
            'section'   => 'the_monday_inner_header_image_section',
            'priority'  => 7,
        )
    );
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/    
    /**
     * 
     * Menu style
     */ 
    
    $wp_customize->add_section(
        'the_monday_menu_style',
        array(
            'title'         => __('Menu style', 'the-monday'),
            'priority'      => 15,
            'panel'         => 'the_monday_header_panel', 
        )
    );
    
    //Sticky menu
    $wp_customize->add_setting(
        'the_monday_main_sticky_menu',
        array(
            'default' => 'sticky',
            'sanitize_callback' => 'the_monday_sanitize_sticky',
        )
    );
    $wp_customize->add_control(
        'the_monday_main_sticky_menu',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __( 'Sticky menu', 'the-monday' ),
            'section' => 'the_monday_menu_style',
            'choices' => array(
                'sticky'   => __( 'Sticky', 'the-monday' ),
                'static'   => __( 'Static', 'the-monday' ),
            ),
        )
    );

    //Disable Single page menu
    $wp_customize->add_setting(
        'single_page_menu_option',
        array(
            'sanitize_callback' => 'the_monday_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'single_page_menu_option',
        array(
            'type'      => 'checkbox',
            'label'     => __( 'Disable Single page Menu', 'the-monday' ),
            'section'   => 'the_monday_menu_style',
            'priority'  => 11,
        )
    );
}