<?php
/**
 * Footer Settings Panel for customizer page
 *
 * @package The Monday
 */
 
add_action( 'customize_register', 'the_monday_footer_settings_panel' );

function the_monday_footer_settings_panel( $wp_customize ){
    $wp_customize->add_panel( 
        'the_monday_footer_setting', 
          array(
            'priority'       => 8,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Footer Settings', 'the-monday'),
            ) 
     );
     
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * Footer contact
      */
    
    $wp_customize->add_section(
        'the_monday_footer_contact', 
        array(
    		'priority' => 3,
    		'title' => __( 'Get In Touch', 'the-monday' ),
    		'panel'=> 'the_monday_footer_setting'
	       )
    );
    
    // Section option
    $wp_customize->add_setting(
        'footer_contact_section_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option'
            )
    );
     $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'footer_contact_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'Get In Touch Section', 'the-monday' ),
                'description' => __( 'Enable/Disable `Get In Touch` in homepage.', 'the-monday' ),
                'section' => 'the_monday_footer_contact',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );
    
    //Section Menu Text
    $wp_customize->add_setting(
        'footer_contact_section_menu_title', 
            array(
                'default' => __( 'Contact', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'footer_contact_section_menu_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Menu Text', 'the-monday' ),
            'section' => 'the_monday_footer_contact',
            'priority' => 3
            )
    );

    //Section Title
    $wp_customize->add_setting(
        'footer_contact_section_title', 
            array(
                'default' => __( 'Get In Touch', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
           )
    );    
    $wp_customize->add_control(
        'footer_contact_section_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Title', 'the-monday' ),
            'section' => 'the_monday_footer_contact',
            'priority' => 3
            )
    );
/*---------------------------------------------------------------------------------------------------------*/
    /**
     * First Contact 
     */
    //Contact Item
    $wp_customize->add_setting(
        'footer_contact_seperator_info', 
        array(
            'type'              => 'settings_seperator',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text',            
        )
     );
     $wp_customize->add_control( new The_Monday_Settings_Seperator( 
        $wp_customize, 'fc1', 
        array(
            'label' => __( 'Contact 1', 'the-monday' ),
            'section' => 'the_monday_footer_contact',
            'settings' => 'static_counter_seperator_info',
            'priority' => 4
            ) 
        )
     );
     
     //Contact title  
     $wp_customize->add_setting(
        'footer_contact_title_1',
        array(
            'default' => __( 'Located In', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_title_1',
            array(
            'type' => 'text',
            'priority' => 5,
            'label' => __( 'Contact Title', 'the-monday'),
            'section' => 'the_monday_footer_contact',
            )
    );
     
     //Contact Icon
     $wp_customize->add_setting(
        'footer_contact_icon_1',
        array(
            'default' => __( 'fa-map-marker', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_icon_1',
            array(
            'type' => 'text',
            'priority' => 5,
            'label' => __( 'Icon', 'the-monday'),
            'description' => __( 'Example: <strong>fa-map-marker</strong>.', 'the-monday' ),
            'section' => 'the_monday_footer_contact',
            )
    );
    
    //Contact info  
     $wp_customize->add_setting(
        'footer_contact_info_1',
        array(
            'default' => __( 'Mathuri Sadan, 5th floor Ravi Bhawan, Kathmandu, Nepal', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_info_1',
            array(
            'type' => 'text',
            'priority' => 6,
            'label' => __( 'Contact Info', 'the-monday'),
            'section' => 'the_monday_footer_contact',
            )
    );

/*---------------------------------------------------------------------------------------------------------*/
     /**
     * Second Contact 
     */
    //Contact Item
    $wp_customize->add_setting(
        'footer_contact_seperator_info', 
        array(
            'type'              => 'settings_seperator',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text',            
        )
     );
     $wp_customize->add_control( new The_Monday_Settings_Seperator( 
        $wp_customize, 'fc2', 
        array(
            'label' => __( 'Contact 2', 'the-monday' ),
            'section' => 'the_monday_footer_contact',
            'settings' => 'static_counter_seperator_info',
            'priority' => 7
            ) 
        )
     );

     //Contact title  
     $wp_customize->add_setting(
        'footer_contact_title_2',
        array(
            'default' => __( 'Mail Us at', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_title_2',
            array(
            'type' => 'text',
            'priority' => 8,
            'label' => __( 'Contact Title', 'the-monday'),
            'section' => 'the_monday_footer_contact',
            )
    );

     //Contact Icon
     $wp_customize->add_setting(
        'footer_contact_icon_2',
        array(
            'default' => __( 'fa-envelope', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_icon_2',
            array(
            'type' => 'text',
            'priority' => 8,
            'label' => __( 'Icon', 'the-monday'),
            'description' => __( 'Example: <strong>fa-envelope</strong>.', 'the-monday' ),
            'section' => 'the_monday_footer_contact',
            )
    );
    
    //Contact info  
     $wp_customize->add_setting(
        'footer_contact_info_2',
        array(
            'default' => __( 'info@accesspressthemes.com', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_info_2',
            array(
            'type' => 'text',
            'priority' => 9,
            'label' => __( 'Contact Info', 'the-monday'),
            'section' => 'the_monday_footer_contact',
            )
    );

/*---------------------------------------------------------------------------------------------------------*/
    /**
     * Third Contact 
     */
    //Contact Item
    $wp_customize->add_setting(
        'footer_contact_seperator_info', 
        array(
            'type'              => 'settings_seperator',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text',            
        )
     );
     $wp_customize->add_control( new The_Monday_Settings_Seperator( 
        $wp_customize, 'fc3', 
        array(
            'label' => __( 'Contact 3', 'the-monday' ),
            'section' => 'the_monday_footer_contact',
            'settings' => 'static_counter_seperator_info',
            'priority' => 10
            ) 
        )
     );
     
     //Contact title  
     $wp_customize->add_setting(
        'footer_contact_title_3',
        array(
            'default' => __( 'Call Us on', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_title_3',
            array(
            'type' => 'text',
            'priority' => 11,
            'label' => __( 'Contact Title', 'the-monday'),
            'section' => 'the_monday_footer_contact',
            )
    );
     
     //Contact Icon
     $wp_customize->add_setting(
        'footer_contact_icon_3',
        array(
            'default' => __( 'fa-phone', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_icon_3',
            array(
            'type' => 'text',
            'priority' => 11,
            'label' => __( 'Icon', 'the-monday'),
            'description' => __( 'Example: <strong>fa-phone</strong>.', 'the-monday' ),
            'section' => 'the_monday_footer_contact',
            )
    );
    
    //Contact info  
     $wp_customize->add_setting(
        'footer_contact_info_3',
        array(
            'default' => __( '+977 989545212', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_info_3',
            array(
            'type' => 'text',
            'priority' => 12,
            'label' => __( 'Contact Info', 'the-monday'),
            'section' => 'the_monday_footer_contact',
            )
    );
    
/*---------------------------------------------------------------------------------------------------------*/
    /**
     * Fourth Contact 
     */
    //Contact Item
    $wp_customize->add_setting(
        'footer_contact_seperator_info', 
        array(
            'type'              => 'settings_seperator',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text',            
        )
     );
     $wp_customize->add_control( new The_Monday_Settings_Seperator( 
        $wp_customize, 'fc4', 
        array(
            'label' => __( 'Contact 4', 'the-monday' ),
            'section' => 'the_monday_footer_contact',
            'settings' => 'static_counter_seperator_info',
            'priority' => 13
            ) 
        )
     );
     
     //Contact title  
     $wp_customize->add_setting(
        'footer_contact_title_4',
        array(
            'default' => __( 'Fax Us', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_title_4',
            array(
            'type' => 'text',
            'priority' => 14,
            'label' => __( 'Contact Title', 'the-monday'),
            'section' => 'the_monday_footer_contact',
            )
    );
     
     //Contact Icon
     $wp_customize->add_setting(
        'footer_contact_icon_4',
        array(
            'default' => __( 'fa-fax', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_icon_4',
            array(
            'type' => 'text',
            'priority' => 14,
            'label' => __( 'Icon', 'the-monday'),
            'description' => __( 'Example: <strong>fa-fax</strong>.', 'the-monday' ),
            'section' => 'the_monday_footer_contact',
            )
    );
    
    //Contact info  
     $wp_customize->add_setting(
        'footer_contact_info_4',
        array(
            'default' => __( '+977 984545212', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'footer_contact_info_4',
            array(
            'type' => 'text',
            'priority' => 15,
            'label' => __( 'Contact Info', 'the-monday'),
            'section' => 'the_monday_footer_contact',
            )
    );    

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * Footer widget area
      */
     
     $wp_customize->add_section(
        'the_monday_footer_widget_layout', 
        array(
    		'priority' => 4,
    		'title' => __( 'Footer Widget layout', 'the-monday' ),
    		'panel'=> 'the_monday_footer_setting'
	       )
    );
    
    // Archive Default layout
	$wp_customize->add_setting(
        'the_monday_footer_widget_option', 
        array(
    		'default' => 'widget_column3',
            'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'the_monday_footer_layout_sanitize',
            'transport' => 'postMessage'
	       )
    );

	$wp_customize->add_control( new The_Monday_Image_Radio_Control(
        $wp_customize, 
        'the_monday_footer_widget_option', 
        array(
    		'type' => 'radio',
    		'label' => __( 'Available layouts', 'the-monday' ),
            'description' => __( 'Select layout for Footer Widget Area.', 'the-monday' ),
    		'section' => 'the_monday_footer_widget_layout',
            'priority'       => 4,
    		'choices' => array(
        			'widget_column4' => THE_MONDAY_ADMIN_IMAGES_URL . '/footer-4.png',
        			'widget_column3' => THE_MONDAY_ADMIN_IMAGES_URL . '/footer-3.png',
        			'widget_column2'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/footer-2.png',
        			'widget_column1'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/footer-1.png'
        		)
	       )
        )
    );
    
    //Section background image
    $wp_customize->add_setting( 
        'footer_background_image', 
        array(
            'default' => '',
        	'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            ) 
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
            'footer_background_image', 
            array(
            	'label'   	=> __( 'Background Image', 'the-monday' ),
            	'section'	=> 'the_monday_footer_widget_layout',
            	'context'	=> 'subscribe-background-image'
                )
        ) 
    );
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * Copyright settings
      */
      
    $wp_customize->add_section(
        'the_monday_copyright_section', 
        array(
    		'priority' => 5,
    		'title' => __('Theme Copyright', 'the-monday'),
    		'panel'=> 'the_monday_footer_setting'
	       )
    );
    
    // copyright textarea
    $wp_customize->add_setting(
        'the_monday_copyright_content',
        array(
            'default' => __( '2015 The Monday', 'the-monday' ),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
    );
    $wp_customize->add_control( new Textarea_Custom_Control(
        $wp_customize,
        'the_monday_copyright_content',
            array(
                'type' => 'the_monday_textarea',
                'label' => __( 'Copyright Content', 'the-monday' ),
                'priority' => 5,
                'section' => 'the_monday_copyright_section'
                )
        )
    );
}