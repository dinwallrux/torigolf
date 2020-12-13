<?php
/**
 * The Monday Theme Customizer
 *
 * @package The Monday
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the_monday_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    
/*------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Theme info
     */
    $pro_themes_url = esc_url( 'https://accesspressthemes.com/wordpress-themes/' );
    $the_monday_more_themes = __( 'View more Free Themes ','the-monday' ).': <a href="'.esc_url( admin_url().'/themes.php?page=the-monday-themes' ).'">'.__( ' here','the-monday' ).'</a>';
    $the_monday_pro_themes = __( 'View Pro Themes ','the-monday' ).': <a href="'.esc_url( 'https://accesspressthemes.com/wordpress-themes/' ).'">'.__( ' here','the-monday' ).'</a>';
    $the_monday_uesful_plugins = __( 'AccessPress Useful Plugins ','the-monday' ).': <a href="'.esc_url( 'https://accesspressthemes.com/plugins/' ).'">'.__( ' here','the-monday' ).'</a>';
    $the_monday_about_theme = __( 'The Monday is powerful features rich WordPress Free theme developed by AccessPress. ', 'the-monday' );
     
    $wp_customize->add_section(
        'the_monday_themeinfo',
        array(
            'title' => __( 'Theme info', 'the-monday' ),
            'priority' => 99,         
        )
    );
    
    // More Themes
    $wp_customize->add_setting(
        'the_monday_more_themes', 
        array(
            'type'              => 'theme_info',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( 
        new The_Monday_Theme_Info( $wp_customize, 
            'the_monday_more_themes', 
            array(
                'section' => 'the_monday_themeinfo',
                'label' => __( 'More Themes', 'the-monday' ),
                'description' =>$the_monday_more_themes,
                'priority' => 5
                )
        )
    );
    
    //Pro Themes
    $wp_customize->add_setting(
        'the_monday_pro_themes', 
        array(
            'type'              => 'theme_info',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( 
        new The_Monday_Theme_Info( $wp_customize, 
            'the_monday_pro_themes', 
            array(
                'section' => 'the_monday_themeinfo',
                'label' => __( 'Pro Themes', 'the-monday' ),
                'description' => $the_monday_pro_themes,
                'priority' => 5
                )
        )
    );
    
    //Usesful Plugins
    $wp_customize->add_setting(
        'the_monday_useful_plugins', 
        array(
            'type'              => 'theme_info',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( 
        new The_Monday_Theme_Info( $wp_customize, 
            'the_monday_useful_plugins', 
            array(
                'section' => 'the_monday_themeinfo',
                'label' => __( 'Useful Plugins ', 'the-monday' ),
                'description' => $the_monday_uesful_plugins,
                'priority' => 5
                )
        )
    );
    
    //Usesful Plugins
    $wp_customize->add_setting(
        'the_monday_about_theme', 
        array(
            'type'              => 'theme_info',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( 
        new The_Monday_Theme_Info( $wp_customize, 
            'the_monday_about_theme', 
            array(
                'section' => 'the_monday_themeinfo',
                'label' => __( 'About The Monday ', 'the-monday' ),
                'description' => $the_monday_about_theme,
                'priority' => 5
                )
        )
    );
}
add_action( 'customize_register', 'the_monday_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the_monday_customize_preview_js() {
	wp_enqueue_script( 'the_monday_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'the_monday_customize_preview_js' );