<?php
/**
 * General Settings Panel for customizer page
 *
 * @package The Monday
 */
 
add_action( 'customize_register', 'the_monday_general_settings_panel' );

function the_monday_general_settings_panel( $wp_customize ){ 
    
    $wp_customize->get_section( 'title_tagline' )->panel = 'the_monday_general_settings';
    $wp_customize->get_section( 'title_tagline' )->priority = '3';
    $wp_customize->get_section( 'header_image' )->title = __( 'Site Logo', 'the-monday' );
    $wp_customize->get_section( 'header_image' )->panel = 'the_monday_general_settings';
    $wp_customize->get_section( 'header_image' )->priority = '4';
    $wp_customize->get_section( 'background_image' )->panel = 'the_monday_general_settings';
    $wp_customize->get_section( 'background_image' )->priority = '6';
    $wp_customize->get_section( 'colors' )->panel = 'the_monday_general_settings';
    $wp_customize->get_section( 'colors' )->priority = '7';
    $wp_customize->get_section( 'static_front_page' )->panel = 'the_monday_general_settings';
    $wp_customize->get_section( 'static_front_page' )->priority = '7';
    
    $wp_customize->add_panel( 
        'the_monday_general_settings', 
            array(
              'priority'       => 3,
              'capability'     => 'edit_theme_options',
              'theme_supports' => '',
              'title'          => __('General Settings', 'the-monday'),
            ) 
     );
     
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    
    /*//Section background image
    $wp_customize->add_setting( 
        'site_logo', 
        array(
            'default' => '',
        	'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            ) 
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
            'site_logo', 
            array(
            	'label'   	=> __( 'Site Logo', 'the-monday' ),
            	'section'	=> 'title_tagline',
            	'context'	=> 'the-monday-site-logo'
                )
        ) 
    );*/
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * 
     * Color section
     */
    /*//Primary color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#2e8ecb',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'         => __('Primary color', 'the-monday'),
                'section'       => 'colors',
                'settings'      => 'primary_color',
                'priority'      => 11
            )
        )
    );
    //Menu bg
    $wp_customize->add_setting(
        'menu_bg_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_bg_color',
            array(
                'label' => __('Menu background', 'the-monday'),
                'section' => 'colors',
                'priority' => 12
            )
        )
    );     
    //Site title
    $wp_customize->add_setting(
        'site_title_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_title_color',
            array(
                'label' => __('Site title', 'the-monday'),
                'section' => 'colors',
                'settings' => 'site_title_color',
                'priority' => 13
            )
        )
    );
    //Site desc
    $wp_customize->add_setting(
        'site_desc_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_desc_color',
            array(
                'label' => __('Site description', 'the-monday'),
                'section' => 'colors',
                'priority' => 14
            )
        )
    );
    //Top level menu items
    $wp_customize->add_setting(
        'top_items_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_items_color',
            array(
                'label' => __('Top level menu items', 'the-monday'),
                'section' => 'colors',
                'priority' => 15
            )
        )
    );
    //Sub menu items color
    $wp_customize->add_setting(
        'submenu_items_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_items_color',
            array(
                'label' => __('Sub-menu items', 'the-monday'),
                'section' => 'colors',
                'priority' => 16
            )
        )
    );
    //Sub menu background
    $wp_customize->add_setting(
        'submenu_background',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_background',
            array(
                'label' => __('Sub-menu background', 'the-monday'),
                'section' => 'colors',
                'priority' => 17
            )
        )
    );
    //Slider text
    $wp_customize->add_setting(
        'slider_text',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'slider_text',
            array(
                'label' => __('Header slider text', 'the-monday'),
                'section' => 'colors',
                'priority' => 18
            )
        )
    );
        
    //Sidebar backgound
    $wp_customize->add_setting(
        'sidebar_background',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_background',
            array(
                'label' => __('Sidebar background', 'the-monday'),
                'section' => 'colors',
                'priority' => 20
            )
        )
    );
    //Sidebar color
    $wp_customize->add_setting(
        'sidebar_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_color',
            array(
                'label' => __('Sidebar color', 'the-monday'),
                'section' => 'colors',
                'priority' => 21
            )
        )
    );
    //Footer widget area
    $wp_customize->add_setting(
        'footer_widgets_background',
        array(
            'default'           => '#252525',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_widgets_background',
            array(
                'label' => __('Footer widget area background', 'the-monday'),
                'section' => 'colors',
                'priority' => 22
            )
        )
    );
    //Footer widget color
    $wp_customize->add_setting(
        'footer_widgets_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_widgets_color',
            array(
                'label' => __('Footer widget area color', 'the-monday'),
                'section' => 'colors',
                'priority' => 23
            )
        )
    );
    //Footer background
    $wp_customize->add_setting(
        'footer_background',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background',
            array(
                'label' => __('Footer background', 'the-monday'),
                'section' => 'colors',
                'priority' => 24
            )
        )
    );
    //Footer color
    $wp_customize->add_setting(
        'footer_color',
        array(
            'default'           => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_color',
            array(
                'label' => __('Footer color', 'the-monday'),
                'section' => 'colors',
                'priority' => 25
            )
        )
    );
    //Rows overlay
    $wp_customize->add_setting(
        'rows_overlay',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'rows_overlay',
            array(
                'label' => __('Rows overlay', 'the-monday'),
                'section' => 'colors',
                'priority' => 26
            )
        )
    );*/
}