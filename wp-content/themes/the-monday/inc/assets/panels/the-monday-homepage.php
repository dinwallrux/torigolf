<?php
/**
 * Home Page Settings Panel for customizer page
 *
 * @package The Monday
 */

add_action( 'customize_register', 'the_monday_homepage_settings_panel' );

function the_monday_homepage_settings_panel( $wp_customize ) {
    $wp_customize->add_panel( 
        'the_monday_homepage_settings', 
          array(
            'priority'       => 5,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Home Page Settings', 'the-monday'),
            ) 
     );

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * About Us section
     */     
    $wp_customize->add_section(
        'the_monday_about',
        array(
            'title'         => __('About Us', 'the-monday'),
            'priority'      => 2,
            'panel'         => 'the_monday_homepage_settings', 
        )
    );
    
    // Switch option for enable/disable section
    $wp_customize->add_setting(
        'about_section_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option',
            )
    );
    $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'about_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'About Us Section', 'the-monday' ),
                'description' => __( 'Choose option to display About Us section at home page', 'the-monday' ),
                'section' => 'the_monday_about',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );
    
    //Section title
    $wp_customize->add_setting(
        'about_section_menu_title', 
            array(
                'default' => __( 'About', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'about_section_menu_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Menu Text', 'the-monday' ),
            'section' => 'the_monday_about',
            'priority' => 4
            )
    ); 
    
    //Select Category for latest blog
    $wp_customize->add_setting(
        'about_page_left',
        array(
            'default' => '0',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text'
        )
    );
    $wp_customize->add_control( 
        new WP_Customize_Page_Control( 
        $wp_customize,
        'about_page_left', 
        array(
            'label' => __( 'Select Page', 'the-monday' ),
            'description' => __( "Select page for About Us left section", "the-monday" ),
            'section' => 'the_monday_about',
            'priority' => 5
            )
        )
    );
    
    //Select Category for latest blog
    $wp_customize->add_setting(
        'about_page_right',
        array(
            'default' => '0',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text'
        )
    );
    $wp_customize->add_control( 
        new WP_Customize_Page_Control( 
        $wp_customize,
        'about_page_right', 
        array(
            'label' => __( 'Select Page', 'the-monday' ),
            'description' => __( "Select page for About Us right section", "the-monday" ),
            'section' => 'the_monday_about',
            'priority' => 6
            )
        )
    );
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Our Services section
     */     
    $wp_customize->add_section(
        'the_monday_services',
        array(
            'title'         => __('Our Services', 'the-monday'),
            'priority'      => 3,
            'panel'         => 'the_monday_homepage_settings', 
        )
    );
    
    // Switch option for enable/disable section
    $wp_customize->add_setting(
        'services_section_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option',
            )
    );
    $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'services_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'Our Services Section', 'the-monday' ),
                'description' => __( 'Choose option to display Our Services section at home page', 'the-monday' ),
                'section' => 'the_monday_services',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );
    
    //Section title
    $wp_customize->add_setting(
        'services_section_menu_title', 
            array(
                'default' => __( 'Services', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'services_section_menu_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Menu Text', 'the-monday' ),
            'section' => 'the_monday_services',
            'priority' => 4
            )
    );
    
    //Section title
    $wp_customize->add_setting(
        'service_section_title', 
            array(
                'default' => __( 'Our Services', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'service_section_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Title', 'the-monday' ),
            'section' => 'the_monday_services',
            'priority' => 5
            )
    );
    
    //Our services posts orderby
    $wp_customize->add_setting(
        'services_posts_orderby',
        array(
            'default' => 'none',
            'sanitize_callback' => 'the_monday_posts_orderby',
        )
    );
    $wp_customize->add_control(
        'services_posts_orderby',
        array(
            'type'  => 'select',
            'priority'  => 6,
            'label' => __( 'Posts Orderby', 'the-monday' ),
            'section' => 'the_monday_services',
            'description' => __( 'Select order by option for posts to display in Our services section.', 'the-monday' ),
            'choices'   => array(
                'none' => __( 'None', 'the-monday' ),
                'title' => __( 'Title', 'the-monday' ),
                'date' => __( 'Date', 'the-monday' ),
                'rand' => __( 'Random', 'the-monday' ),
            ),
        )
    );
    
    //Our services posts order
    $wp_customize->add_setting(
        'services_posts_order',
        array(
            'default' => 'DESC',
            'sanitize_callback' => 'the_monday_posts_order',
        )
    );
    $wp_customize->add_control(
        'services_posts_order',
        array(
            'type'  => 'select',
            'priority'  => 6,
            'label' => __( 'Posts Order', 'the-monday' ),
            'section' => 'the_monday_services',
            'description' => __( 'Select Posts order in Our services section.', 'the-monday' ),
            'choices'   => array(
                'DESC' => __( 'Descending', 'the-monday' ),
                'ASC' => __( 'Ascending', 'the-monday' )
            ),
            'active_callback' => 'service_post_order_callback',
        )
    );

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Featrued Product Section
     */
     
    $wp_customize->add_section(
        'the_monday_featured_product',
        array(
            'title'         => __( 'Featured Product', 'the-monday' ),
            'priority'      => 4,
            'panel'         => 'the_monday_homepage_settings', 
        )
    );
    
    // Switch option for enable/disable section
    $wp_customize->add_setting(
        'featured_product_section_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option',
            )
    );
    $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'featured_product_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'Featured Product Section', 'the-monday' ),
                'description' => __( 'Choose option to display Featured Product section at home page', 'the-monday' ),
                'section' => 'the_monday_featured_product',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Subscribe section
     * 
     */
    $wp_customize->add_section(
        'the_monday_subscribe_section',
        array(
            'title'         => __( 'Subscribe Today', 'the-monday' ),
            'priority'      => 5,
            'panel'         => 'the_monday_homepage_settings', 
        )
    );
    // Switch option for enable/disable section
    $wp_customize->add_setting(
        'subscribe_section_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option',
            )
    );
    $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'subscribe_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'Subscribe Section', 'the-monday' ),
                'description' => __( 'Choose option to display Subscribe section at home page', 'the-monday' ),
                'section' => 'the_monday_subscribe_section',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );
    
    //Section background image
    $wp_customize->add_setting( 
        'subscribe_background_image', 
        array(
            'default' => '',
        	'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            ) 
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
            'subscribe_background_image', 
            array(
            	'label'   	=> __( 'Background Image', 'the-monday' ),
            	'section'	=> 'the_monday_subscribe_section',
            	'context'	=> 'subscribe-background-image'
                )
        ) 
    );

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Our Team Section
     * 
     */
     $wp_customize->add_section(
        'the_monday_team_section',
        array(
            'title' => __( 'Team Members', 'the-monday' ),
            'priority' => 6,
            'panel' => 'the_monday_homepage_settings'
            )
     );
     
    // Switch option for enable/disable section
    $wp_customize->add_setting(
        'team_section_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option',
            )
    );
    $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'team_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'Team Member Section', 'the-monday' ),
                'description' => __( 'Choose option to display Team Member Section at home page', 'the-monday' ),
                'section' => 'the_monday_team_section',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );
    
    //Section title
    $wp_customize->add_setting(
        'team_section_menu_title', 
            array(
                'default' => __( 'Experts', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'team_section_menu_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Menu Text', 'the-monday' ),
            'section' => 'the_monday_team_section',
            'priority' => 4
            )
    );
    
    //Section title
    $wp_customize->add_setting(
        'team_section_title', 
            array(
                'default' => __( 'Meet The Experts', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'team_section_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Title Text', 'the-monday' ),
            'section' => 'the_monday_team_section',
            'priority' => 5
            )
    );
     
     // Choose posts option
    $wp_customize->add_setting(
        'team_posts_option',
        array(
            'default' => 'allposts',
            //'transport' => 'postMessage',
            'sanitize_callback' => 'the_monday_posts_perpage_option',
            )
    );
    $wp_customize->add_control(
        'team_posts_option',
        array(
            'type'=>'radio',
            'priority' => 6,
            'label' => __( 'Posts Options', 'the-monday' ),
            'description' => __( 'Select option to define number of posts in Team Members section.', 'the-monday' ),
            'section' => 'the_monday_team_section',
            'choices' => array(
                'allposts' => __( 'All Posts', 'the-monday' ),
                'countposts' => __( 'Numbers of Posts', 'the-monday' )
                ),
            )
    );
    
    //Posts per page
    $wp_customize->add_setting(
        'team_posts_count',
        array(
            'default' => '6',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'team_posts_count',
        array(
            'type' => 'number',
            'priority' => 7,
            'label' => __( 'Number of Posts', 'the-monday' ),
            'description'   => __( 'Choose number of posts for Our Team section.', 'the-monday' ),
            'section' => 'the_monday_team_section',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            'active_callback' => 'team_post_count_callback',
            )
    );
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Testimonial Section
     * 
     */
    
    $wp_customize->add_section(
        'the_monday_testimonials_section',
        array(
            'title' => __( 'Testimonials', 'the-monday' ),
            'priority' => 7,
            'panel' => 'the_monday_homepage_settings'
            )
     );
     
    // Testimonials section 
    $wp_customize->add_setting(
        'testimonials_section_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option'
            )
    );
     $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'testimonials_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'Testimonials Section', 'the-monday' ),
                'description' => __( 'Enable/Disable Testimonials Section in home page.', 'the-monday' ),
                'section' => 'the_monday_testimonials_section',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );
    
    //Section title
    $wp_customize->add_setting(
        'testimonials_section_menu_title', 
            array(
                'default' => __( '', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'testimonials_section_menu_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Menu Text', 'the-monday' ),
            'section' => 'the_monday_testimonials_section',
            'priority' => 4
            )
    );
    
    //Section title
    $wp_customize->add_setting(
        'testimonials_section_title', 
            array(
                'default' => __( "Let's Hear What Clients Say", 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'testimonials_section_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Title Text', 'the-monday' ),
            'section' => 'the_monday_testimonials_section',
            'priority' => 5
            )
    );
    
    // Choose posts option
    $wp_customize->add_setting(
        'testimonials_posts_option',
        array(
            'default' => 'allposts',
            'sanitize_callback' => 'the_monday_posts_perpage_option',
            //'transport'=>'postMessage'
            )
    );
    $wp_customize->add_control(
        'testimonials_posts_option',
        array(
            'type'=>'radio',
            'priority' => 6,
            'label' => __( 'Posts Options', 'the-monday' ),
            'description' => __( 'Select option to define number of posts in Testimonials Section.', 'the-monday' ),
            'section' => 'the_monday_testimonials_section',
            'choices' => array(
                'allposts' => __( 'All Posts', 'the-monday' ),
                'countposts' => __( 'Numbers of Posts', 'the-monday' )
                ),
            )
    );
    
    //Posts per page
    $wp_customize->add_setting(
        'tesimonials_posts_count',
        array(
            'default' => '3',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'tesimonials_posts_count',
        array(
            'type' => 'number',
            'priority' => 7,
            'label' => __( 'Number of Posts', 'the-monday' ),
            'description'   => __( 'Choose number of posts for Our Testimonials Section.', 'the-monday' ),
            'section' => 'the_monday_testimonials_section',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            'active_callback' => 'testimonials_post_count_callback',
            )
    );
    
    //Section background image
    $wp_customize->add_setting( 
        'testimonials_background_image', 
        array(
            'default' => '',
        	'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            ) 
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
            'testimonials_background_image', 
            array(
            	'label'   	=> __( 'Background Image', 'the-monday' ),
            	'section'	=> 'the_monday_testimonials_section',
                'priority' => 8,
            	'context'	=> 'subscribe-background-image'
                )
        ) 
    );

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Static Counter
     * 
     */
     $wp_customize->add_section(
        'the_monday_static_counter',
        array(
            'title' => __( 'Static Counter', 'the-monday' ),
            'description' => __('You can add up to 5 counters.', 'the-monday'),
            'priority' => 8,
            'panel' => 'the_monday_homepage_settings'
            )
     );
     
     /**
      * First fact settings
      */
     $wp_customize->add_setting(
        'static_counter_seperator_info', 
        array(
            'type'              => 'settings_seperator',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text',            
        )
     );
     $wp_customize->add_control( new The_Monday_Settings_Seperator( 
        $wp_customize, 's1', 
        array(
            'label' => __('First Static Counter', 'the-monday'),
            'section' => 'the_monday_static_counter',
            'settings' => 'static_counter_seperator_info',
            'priority' => 3
            ) 
        )
     );
     
     //Static Counter Icon
     $wp_customize->add_setting(
        'static_counter_icon_1',
        array(
            'default' => __( 'fa-code', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'static_counter_icon_1',
            array(
            'type' => 'text',
            'priority' => 4,
            'label' => __( 'Icon', 'the-monday'),
            'description' => __( 'Example: <strong>fa-code</strong>.', 'the-monday' ),
            'section' => 'the_monday_static_counter',
            )
    );
     //Static Counter title   
     $wp_customize->add_setting(
        'static_counter_title_1',
        array(
            'default' => __( 'Lines of Code', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'static_counter_title_1',
            array(
            'type' => 'text',
            'priority' => 5,
            'label' => __( 'Title', 'the-monday'),
            'section' => 'the_monday_static_counter',
            )
    );
    //Static Counter counter number
    $wp_customize->add_setting(
        'static_counter_number_1',
        array(
            'default' => '76294',
            'sanitize_callback' => 'the_monday_sanitize_number',
            'transport' => 'postMessage'
            )
    );
    $wp_customize->add_control(
        'static_counter_number_1',
        array(
            'type' => 'number',
            'priority' => 6,
            'label' => __( 'Number', 'the-monday' ),
            'description'   => __( 'Set your Static Counter in numbers.', 'the-monday' ),
            'section' => 'the_monday_static_counter',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 1000000,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    /**
      * Second fact settings
      */
     $wp_customize->add_setting(
        'static_counter_seperator_info', 
        array(
            'type'              => 'settings_seperator',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text',            
        )
     );
     $wp_customize->add_control( new The_Monday_Settings_Seperator( 
        $wp_customize, 's2', 
        array(
            'label' => __('Second Static Counter', 'the-monday'),
            'section' => 'the_monday_static_counter',
            'settings' => 'static_counter_seperator_info',
            'priority' => 7
            ) 
        )
     );
     
     //Static Counter Icon
     $wp_customize->add_setting(
        'static_counter_icon_2',
        array(
            'default' => __( 'fa-beer', 'the-monday') ,
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'static_counter_icon_2',
            array(
            'type' => 'text',
            'priority' => 8,
            'label' => __( 'Icon', 'the-monday'),
            'description' => __( 'Example: <strong>fa-beer</strong>.', 'the-monday' ),
            'section' => 'the_monday_static_counter',
            )
    );
     //Static Counter title   
     $wp_customize->add_setting(
        'static_counter_title_2',
        array(
            'default' => __( 'Mugs of Beer', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'static_counter_title_2',
            array(
            'type' => 'text',
            'priority' => 9,
            'label' => __( 'Title', 'the-monday'),
            'section' => 'the_monday_static_counter',
            )
    );
    //Static Counter counter number
    $wp_customize->add_setting(
        'static_counter_number_2',
        array(
            'default' => '40',
            'sanitize_callback' => 'the_monday_sanitize_number',
            'transport' => 'postMessage'
            )
    );
    $wp_customize->add_control(
        'static_counter_number_2',
        array(
            'type' => 'number',
            'priority' => 10,
            'label' => __( 'Number', 'the-monday' ),
            'description'   => __( 'Set your Static Counter in numbers.', 'the-monday' ),
            'section' => 'the_monday_static_counter',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 1000000,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    /**
      * Third fact settings
      */
     $wp_customize->add_setting(
        'static_counter_seperator_info', 
        array(
            'type'              => 'settings_seperator',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text',            
        )
     );
     $wp_customize->add_control( new The_Monday_Settings_Seperator( 
        $wp_customize, 's3', 
        array(
            'label' => __('Third Static Counter', 'the-monday'),
            'section' => 'the_monday_static_counter',
            'settings' => 'static_counter_seperator_info',
            'priority' => 11
            ) 
        )
     );
     
     //Static Counter Icon
     $wp_customize->add_setting(
        'static_counter_icon_3',
        array(
            'default' => __( 'fa-rocket' ,'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'static_counter_icon_3',
            array(
            'type' => 'text',
            'priority' => 12,
            'label' => __( 'Icon', 'the-monday'),
            'description' => __( 'Example: <strong>fa-rocket</strong>.', 'the-monday' ),
            'section' => 'the_monday_static_counter',
            )
    );
     //Static Counter title   
     $wp_customize->add_setting(
        'static_counter_title_3',
        array(
            'default' => __( 'Completed Projects', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'static_counter_title_3',
            array(
            'type' => 'text',
            'priority' => 13,
            'label' => __( 'Title', 'the-monday'),
            'section' => 'the_monday_static_counter',
            )
    );
    //Static Counter counter number
    $wp_customize->add_setting(
        'static_counter_number_3',
        array(
            'default' => '350',
            'sanitize_callback' => 'the_monday_sanitize_number',
            'transport' => 'postMessage'
            )
    );
    $wp_customize->add_control(
        'static_counter_number_3',
        array(
            'type' => 'number',
            'priority' => 14,
            'label' => __( 'Number', 'the-monday' ),
            'description'   => __( 'Set your Static Counter in numbers.', 'the-monday' ),
            'section' => 'the_monday_static_counter',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 1000000,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    /**
      * Fourth fact settings
      */
     $wp_customize->add_setting(
        'static_counter_seperator_info', 
        array(
            'type'              => 'settings_seperator',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text',            
        )
     );
     $wp_customize->add_control( new The_Monday_Settings_Seperator( 
        $wp_customize, 's4', 
        array(
            'label' => __('Fourth Static Counter', 'the-monday'),
            'section' => 'the_monday_static_counter',
            'settings' => 'static_counter_seperator_info',
            'priority' => 15
            ) 
        )
     );
     
     //Static Counter Icon
     $wp_customize->add_setting(
        'static_counter_icon_4',
        array(
            'default' => __( 'fa-trophy', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'static_counter_icon_4',
            array(
            'type' => 'text',
            'priority' => 16,
            'label' => __( 'Icon', 'the-monday'),
            'description' => __( 'Example: <strong>fa-trophy</strong>.', 'the-monday' ),
            'section' => 'the_monday_static_counter',
            )
    );
     //Static Counter title   
     $wp_customize->add_setting(
        'static_counter_title_4',
        array(
            'default' => __( 'Awards Achieved', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'static_counter_title_4',
            array(
            'type' => 'text',
            'priority' => 17,
            'label' => __( 'Title', 'the-monday'),
            'section' => 'the_monday_static_counter',
            )
    );
    //Static Counter counter number
    $wp_customize->add_setting(
        'static_counter_number_4',
        array(
            'default' => '72',
            'sanitize_callback' => 'the_monday_sanitize_number',
            'transport' => 'postMessage'
            )
    );
    $wp_customize->add_control(
        'static_counter_number_4',
        array(
            'type' => 'number',
            'priority' => 18,
            'label' => __( 'Number', 'the-monday' ),
            'description'   => __( 'Set your Static Counter in numbers.', 'the-monday' ),
            'section' => 'the_monday_static_counter',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 1000000,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );
    
    /**
      * Fifth fact settings
      */
     $wp_customize->add_setting(
        'static_counter_seperator_info', 
        array(
            'type'              => 'settings_seperator',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text',            
        )
     );
     $wp_customize->add_control( new The_Monday_Settings_Seperator( 
        $wp_customize, 's5', 
        array(
            'label' => __('Fifth Static Counter', 'the-monday'),
            'section' => 'the_monday_static_counter',
            'settings' => 'static_counter_seperator_info',
            'priority' => 19
            ) 
        )
     );
     
     //Static Counter Icon
     $wp_customize->add_setting(
        'static_counter_icon_5',
        array(
            'default' => __( 'fa-shopping-cart', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'static_counter_icon_5',
            array(
            'type' => 'text',
            'priority' => 20,
            'label' => __( 'Icon', 'the-monday'),
            'description' => __( 'Example: <strong>fa-shopping-cart</strong>.', 'the-monday' ),
            'section' => 'the_monday_static_counter',
            )
    );
     //Static Counter title   
     $wp_customize->add_setting(
        'static_counter_title_5',
        array(
            'default' => __( 'Purchases', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
     );
     
     $wp_customize->add_control(
        'static_counter_title_5',
            array(
            'type' => 'text',
            'priority' => 21,
            'label' => __( 'Title', 'the-monday'),
            'section' => 'the_monday_static_counter',
            )
    );
    //Static Counter counter number
    $wp_customize->add_setting(
        'static_counter_number_5',
        array(
            'default' => '537',
            'sanitize_callback' => 'the_monday_sanitize_number',
            'transport' => 'postMessage'
            )
    );
    $wp_customize->add_control(
        'static_counter_number_5',
        array(
            'type' => 'number',
            'priority' => 22,
            'label' => __( 'Number', 'the-monday' ),
            'description'   => __( 'Set your Static Counter in numbers.', 'the-monday' ),
            'section' => 'the_monday_static_counter',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 1000000,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            )
    );

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Portfolio 
     */
    $wp_customize->add_section(
        'the_monday_portfolio_section',
        array(
            'title' => 'Portfolio',
            'priority' => 9,
            'panel' => 'the_monday_homepage_settings'
            )
    );
    
    // Section Display Option
    $wp_customize->add_setting(
        'portfolio_section_option',
        array(
            'default' => __( 'enable', 'the-monday' ),
            'sanitize_callback' => 'the_monday_switch_option'
            )
    );
     $wp_customize->add_control( new WP_Customize_Switch_Control(
            $wp_customize, 
            'portfolio_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'Portfolio Section', 'the-monday' ),
                'description' => __( 'Enable/Disable Portfolio Section in home page.', 'the-monday' ),
                'section' => 'the_monday_portfolio_section',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );

    //Section Menu Text
    $wp_customize->add_setting(
        'portfolio_section_menu_title', 
            array(
                'default' => __( 'Portfolio', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'portfolio_section_menu_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Menu Text', 'the-monday' ),
            'section' => 'the_monday_portfolio_section',
            'priority' => 4
            )
    );

    //Section Title
    $wp_customize->add_setting(
        'portfolio_section_title', 
            array(
                'default' => __( 'What Have We Done So Far?', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
           )
    );    
    $wp_customize->add_control(
        'portfolio_section_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Title', 'the-monday' ),
            'section' => 'the_monday_portfolio_section',
            'priority' => 5
            )
    );    
         
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Our Skills 
     */
    $wp_customize->add_section(
        'the_monday_skill_section',
        array(
            'title' => 'Our Skills',
            'priority' => 9,
            'panel' => 'the_monday_homepage_settings'
            )
    );

    // Section option
    $wp_customize->add_setting(
        'skill_section_option',
        array(
            'default' => __( 'enable', 'the-monday' ),
            'sanitize_callback' => 'the_monday_switch_option'
            )
    );
     $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'skill_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'Skill Section', 'the-monday' ),
                'description' => __( 'Enable/Disable Skill Section in home page.', 'the-monday' ),
                'section' => 'the_monday_skill_section',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );

    //skill Section title   
    $wp_customize->add_setting(
        'skill_section_title',
        array(
            'default' => __( 'We Have Got Skills', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
    );
     
    $wp_customize->add_control(
        'skill_section_title',
            array(
            'type' => 'text',
            'priority' => 4,
            'label' => __( 'Section Title', 'the-monday'),
            'description' => __( 'Add title which display at left side of section.', 'the-monday' ),
            'section' => 'the_monday_skill_section',
            )
    );

    // Skill section description.
    $wp_customize->add_setting(
        'skill_section_description',
        array(
            'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'the-monday' ),
            'sanitize_callback' => 'the_monday_sanitize_text',
            'transport' => 'postMessage'
            )
    );
    $wp_customize->add_control( new Textarea_Custom_Control(
        $wp_customize,
        'skill_section_description',
            array(
                'type' => 'the_monday_textarea',
                'label' => __( 'Section Description', 'the-monday' ),
                'description' => __( 'Add your description which display at left side of section.', 'the-monday' ),
                'priority' => 5,
                'section' => 'the_monday_skill_section'
                )
        )
    );
    
    $settings_priority = 5 ;
    $seperator_label = array( __( "", "the-monday" ), __( "First skill", "the-monday" ), __( "Second skill", "the-monday" ),  __( "Third skill", "the-monday" ), __( "Fourth skill", "the-monday" ), __( "Fifth skill", "the-monday" ), __( "Sixth skill", "the-monday" ) );
    $default_skill_title = array( __( "", "the-monday" ), __( "Web Design", "the-monday" ), __( "Html/Css", "the-monday" ), __( "Graphic Design", "the-monday" ), __( "UI / UX", "the-monday" ), __( "Coding", "the-monday" ), __( "Seo", "the-monday" ) );
    $default_skill_percentage = array( __( "", "the-monday" ), __( "90", "the-monday" ), __( "75", "the-monday" ), __( "70", "the-monday" ), __( "85", "the-monday" ), __( "70", "the-monday" ), __( "100", "the-monday" ) );
    for( $i=1; $i<=6; $i++ ) {
        
        //Skill Seperator
        $wp_customize->add_setting(
            'skill_seperator_info', 
            array(
                'type'              => 'settings_seperator',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'the_monday_sanitize_text',            
            )
        );
        $wp_customize->add_control( new The_Monday_Settings_Seperator( 
            $wp_customize, 'e'.$i, 
            array(
                'label' => $seperator_label[$i],
                'section' => 'the_monday_skill_section',
                'settings' => 'skill_seperator_info',
                'priority' => $settings_priority++,
                ) 
            )
        );

        //skill title   
        $wp_customize->add_setting(
            'skill_title_'.$i,
            array(
                'default' => $default_skill_title[$i],
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
                )
        );
         
        $wp_customize->add_control(
            'skill_title_'.$i,
                array(
                'type' => 'text',
                'priority' => $settings_priority++,
                'label' => __( 'Title', 'the-monday'),
                'section' => 'the_monday_skill_section',
                )
        );

        //skill Percentage number
        $wp_customize->add_setting(
            'skill_percent_'.$i,
            array(
                'default' => $default_skill_percentage[$i],
                'sanitize_callback' => 'the_monday_sanitize_number',
                'transport' => 'postMessage'
                )
        );
        $wp_customize->add_control(
            'skill_percent_'.$i,
            array(
                'type' => 'number',
                'priority' => $settings_priority++,
                'label' => __( 'Percentage', 'the-monday' ),
                'description'   => __( 'Set your skills in percent.', 'the-monday' ),
                'section' => 'the_monday_skill_section',
                'input_attrs' => array(
                    'min'   => 1,
                    'max'   => 100,
                    'step'  => 1,
                    'style' => 'margin-bottom: 15px; padding: 10px;',
                    ),
                )
        );
    }
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Our Clients
     */
    
    $wp_customize->add_section(
        'the_monday_clients',
        array(
            'title' => __( 'Our Clients', 'the-monday' ),
            'priority' => 11,
            'panel' => 'the_monday_homepage_settings'
            )
    );
    
    // Section Display Option
    $wp_customize->add_setting(
        'clients_section_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option'
            )
    );
     $wp_customize->add_control( new WP_Customize_Switch_Control(
            $wp_customize, 
            'clients_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 2,
                'label' => __( 'Our Clients Section', 'the-monday' ),
                'description' => __( 'Enable/Disable Clients Section in home page.', 'the-monday' ),
                'section' => 'the_monday_clients',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );
    
    //Section Menu title
    $wp_customize->add_setting(
        'clients_section_menu_title', 
            array(
                'default' => __( 'Clients', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'clients_section_menu_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Menu Text', 'the-monday' ),
            'section' => 'the_monday_clients',
            'priority' => 3
            )
    ); 
    
    //Section title
    $wp_customize->add_setting(
        'client_section_title', 
            array(
                'default' => __( 'Our Valuable Clients', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'client_section_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Menu Text', 'the-monday' ),
            'section' => 'the_monday_clients',
            'priority' => 4
            )
    ); 
    
    // Choose posts option
    $wp_customize->add_setting(
        'clients_posts_option',
        array(
            'default' => 'allposts',
            'sanitize_callback' => 'the_monday_posts_perpage_option',
            //'transport'=>'postMessage'
            )
    );
    $wp_customize->add_control(
        'clients_posts_option',
        array(
            'type'=>'radio',
            'priority' => 5,
            'label' => __( 'Posts Options', 'the-monday' ),
            'description' => __( 'Select option to define number of posts in Our Clients Section.', 'the-monday' ),
            'section' => 'the_monday_clients',
            'choices' => array(
                'allposts' => __( 'All Posts', 'the-monday' ),
                'countposts' => __( 'Numbers of Posts', 'the-monday' )
                ),
            )
    );
    
    //Posts per page
    $wp_customize->add_setting(
        'clients_posts_count',
        array(
            'default' => '6',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'clients_posts_count',
        array(
            'type' => 'number',
            'priority' => 6,
            'label' => __( 'Number of Posts', 'the-monday' ),
            'description'   => __( 'Choose number of posts for Our Clients Section.', 'the-monday' ),
            'section' => 'the_monday_clients',
            'input_attrs' => array(
                'min'   => 1,
                'max'   => 100,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
                ),
            'active_callback' => 'clients_post_count_callback',
            )
    );
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Latest Blog
     */
    
    $wp_customize->add_section(
        'the_monday_latest_blog',
        array(
            'title' => __( 'Latest Blog', 'the-monday' ),
            'priority' => 12,
            'panel' => 'the_monday_homepage_settings'
            )
    );
    
    // Section option
    $wp_customize->add_setting(
        'blog_section_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option'
            )
    );
     $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'blog_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'Blog Section', 'the-monday' ),
                'description' => __( 'Enable/Disable Latest Blog section in homepage.', 'the-monday' ),
                'section' => 'the_monday_latest_blog',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );
    
    //Section Menu title
    $wp_customize->add_setting(
        'blog_section_menu_title', 
            array(
                'default' => __( 'Blog', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'blog_section_menu_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Menu Text', 'the-monday' ),
            'section' => 'the_monday_latest_blog',
            'priority' => 4
            )
    ); 
    
    //Section title
    $wp_customize->add_setting(
        'blog_section_title', 
            array(
                'default' => __( 'Latest From Blogs', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'blog_section_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Title', 'the-monday' ),
            'section' => 'the_monday_latest_blog',
            'priority' => 5
            )
    ); 
    
    //Select Category for latest blog
    $wp_customize->add_setting(
        'blog_category',
        array(
            'default' => '0',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'the_monday_sanitize_text'
        )
    );
    $wp_customize->add_control( 
        new WP_Customize_Category_Control( 
        $wp_customize,
        'blog_category', 
        array(
            'label' => __( "Blog's Category", 'the-monday' ),
            'description' => __( "Select cateogry for Latest Blog section", "the-monday" ),
            'section' => 'the_monday_latest_blog',
            'priority' => 6
            )
        )
    );
    
    //Our services posts orderby
    $wp_customize->add_setting(
        'blog_posts_orderby',
        array(
            'default' => 'none',
            'sanitize_callback' => 'the_monday_posts_orderby',
        )
    );
    $wp_customize->add_control(
        'blog_posts_orderby',
        array(
            'type'  => 'select',
            'priority'  => 7,
            'label' => __( 'Posts Orderby', 'the-monday' ),
            'section' => 'the_monday_latest_blog',
            'description' => __( 'Select order by option for posts to display in Latest Blog section.', 'the-monday' ),
            'choices'   => array(
                'none' => __( 'None', 'the-monday' ),
                'title' => __( 'Title', 'the-monday' ),
                'date' => __( 'Date', 'the-monday' ),
                'rand' => __( 'Random', 'the-monday' ),
            ),
        )
    );
    
    //Our services posts order
    $wp_customize->add_setting(
        'blog_posts_order',
        array(
            'default' => 'DESC',
            'sanitize_callback' => 'the_monday_posts_order',
        )
    );
    $wp_customize->add_control(
        'blog_posts_order',
        array(
            'type'  => 'select',
            'priority'  => 8,
            'label' => __( 'Posts Order', 'the-monday' ),
            'section' => 'the_monday_latest_blog',
            'description' => __( 'Select Posts order in Latest Blog section.', 'the-monday' ),
            'choices'   => array(
                'DESC' => __( 'Descending', 'the-monday' ),
                'ASC' => __( 'Ascending', 'the-monday' )
            ),
            'active_callback' => 'blog_post_order_callback',
        )
    );
    
    /*// Post's Entry Meta
    $wp_customize->add_setting(
        'blog_post_meta_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option'
            )
    );
     $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'blog_post_meta_option', 
            array(
                'type' => 'switch',
                'priority'  => 9,
                'label' => __( 'Entry Meta', 'the-monday' ),
                'description' => __( 'Enable/Disable Entry Meta (date/author/comments)of each posts displyed in Latest Blog section.', 'the-monday' ),
                'section' => 'the_monday_latest_blog',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    );*/
    
    //Section title
    $wp_customize->add_setting(
        'blog_more_button_title', 
            array(
                'default' => __( 'More Posts', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'blog_more_button_title',
            array(
            'type' => 'text',
            'label' => __( 'Button Text', 'the-monday' ),
            'section' => 'the_monday_latest_blog',
            'priority' => 10
            )
    ); 
    
    //Hide read more button
    $wp_customize->add_setting(
        'blog_more_posts_option',
        array(
            'sanitize_callback' => 'the_monday_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'blog_more_posts_option',
        array(
            'type'      => 'checkbox',
            'label'     => __( 'Check to hide More Posts button', 'the-monday' ),
            'section'   => 'the_monday_latest_blog',
            'priority'  => 11,
        )
    );
    
    //Section background image
    $wp_customize->add_setting( 
        'blog_background_image', 
        array(
            'default' => '',
        	'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            ) 
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
            'blog_background_image', 
            array(
            	'label'   	=> __( 'Background Image', 'the-monday' ),
            	'section'	=> 'the_monday_latest_blog',
            	'context'	=> 'subscribe-background-image',
                'priority'  => 12
                )
        ) 
    );

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Price Table
     */
    
   $wp_customize->add_section(
        'the_monday_price_tables',
        array(
            'title' => __( 'Price Tables', 'the-monday' ),
            'priority' => 13,
            'panel' => 'the_monday_homepage_settings'
            )
    );
    
    // Section option
    $wp_customize->add_setting(
        'price_tables_section_option',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'the_monday_switch_option'
            )
    );
     $wp_customize->add_control( new WP_Customize_Switch_Control(
        $wp_customize, 
            'price_tables_section_option', 
            array(
                'type' => 'switch',
                'priority'  => 3,
                'label' => __( 'Price Tables Section', 'the-monday' ),
                'description' => __( 'Enable/Disable Pricing Tables in homepage.', 'the-monday' ),
                'section' => 'the_monday_price_tables',
                'choices'   => array(
                    'enable' => __( 'Enable', 'the-monday' ),
                    'disable' => __( 'Disable', 'the-monday' ),
                    ),
                )
        )
    ); 
    
    //Section Menu title
    $wp_customize->add_setting(
        'price_tables_section_menu_title', 
            array(
                'default' => __( '', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'price_tables_section_menu_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Menu Text', 'the-monday' ),
            'section' => 'the_monday_price_tables',
            'priority' => 4
            )
    ); 
    
    //Section title
    $wp_customize->add_setting(
        'price_tables_section_title', 
            array(
                'default' => __( 'Chose Your Plan', 'the-monday' ),
                'sanitize_callback' => 'the_monday_sanitize_text',
                'transport' => 'postMessage'
	       )
    );    
    $wp_customize->add_control(
        'price_tables_section_title',
            array(
            'type' => 'text',
            'label' => __( 'Section Title', 'the-monday' ),
            'section' => 'the_monday_price_tables',
            'priority' => 5
            )
    );
}