<?php
/**
 * Design Settings Panel for customizer page
 *
 * @package The Monday
 */
 
add_action( 'customize_register', 'the_monday_design_settings_panel' );

function the_monday_design_settings_panel( $wp_customize ){
     $wp_customize->add_panel( 
        'the_monday_design_layout', 
          array(
            'priority'       => 6,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Design Layout', 'the-monday'),
            ) 
     );
     
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * Blog page settings
      */
      
	$wp_customize->add_section(
        'the_monday_blog_page_setting', 
        array(
    		'priority' => 2,
    		'title' => __('Blog Page Settings', 'the-monday'),
    		'panel'=> 'the_monday_design_layout'
	       )
    );
    
    // Categories checkbox
    $wp_customize->add_setting( 
        'blog_exclude_categories', 
        array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
            )
    );     
    $wp_customize->add_control(
        new Cstmzr_Category_Checkboxes_Control(
            $wp_customize,
            'blog_exclude_categories',
            array(
                'label' => __( 'Categories Lists', 'the-monday' ),
                'description' => __( 'Checked the categories to get posts display in blog page.', 'the-monday' ),
                'section' => 'the_monday_blog_page_setting',
                'type' => 'category-checkboxes',
                'priority'       => 3
            )
        )
    );
    
    /*// Blog page layout
    $wp_customize->add_setting(
        'the_monday_blog_page_layout',
        array(
            'default'           => 'classic',
            'sanitize_callback' => 'the_monday_blog_page_layout_sanitize',
        )       
    );
    $wp_customize->add_control(
        'the_monday_blog_page_layout',
        array(
            'type' => 'radio',
            'priority'    => 4,
            'label' => __( 'Page Layout Options', 'the-monday' ),
            'description' => __( 'Choose available layout for Blog page.', 'the-monday' ),
            'section' => 'the_monday_blog_page_setting',
            'choices' => array(
                'classic' => __( 'Classic', 'the-monday' ),
                'grid' => __( 'Grid Style', 'the-monday' )
            ),
        )
    );*/

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * Archive sidebar setting
      */
      
	$wp_customize->add_section(
        'the_monday_archive_setting', 
        array(
    		'priority' => 3,
    		'title' => __('Archive Settings', 'the-monday'),
    		'panel'=> 'the_monday_design_layout'
	       )
    );
    
    // Archive's sidebars
	$wp_customize->add_setting(
        'the_monday_archive_sidebar', 
        array(
    		'default' => 'right_sidebar',
            'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'the_monday_page_sidebar_sanitize'
	       )
    );

	$wp_customize->add_control( new The_Monday_Image_Radio_Control(
        $wp_customize, 
        'the_monday_archive_sidebar', 
        array(
    		'type' => 'radio',
    		'label' => __( 'Available Sidebars', 'the-monday' ),
            'description' => __( 'Select sidebar for whole site archives, categories, search page etc.', 'the-monday' ),
    		'section' => 'the_monday_archive_setting',
            'priority'       => 3,
    		'choices' => array(
        			'right_sidebar' => THE_MONDAY_ADMIN_IMAGES_URL . '/right-sidebar.png',
        			'left_sidebar' => THE_MONDAY_ADMIN_IMAGES_URL . '/left-sidebar.png',
        			'no_sidebar_full_width'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
        			'no_sidebar_content_centered'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
        		)
	       )
        )
    );
    
    /*
    // Archive page layout
    $wp_customize->add_setting(
        'the_monday_archive_layout',
        array(
            'default'           => 'classic',
            'sanitize_callback' => 'the_monday_archive_layout_sanitize',
        )       
    );
    $wp_customize->add_control(
        'the_monday_archive_layout',
        array(
            'type' => 'radio',
            'priority'    => 4,
            'label' => __( 'Layout Options', 'the-monday' ),
            'description' => __( 'Choose page layout option for categories pages.', 'the-monday' ),
            'section' => 'the_monday_archive_setting',
            'choices' => array(
                'classic' => __( 'Classic', 'the-monday' ),
                'grid' => __( 'Grid Style', 'the-monday' )
            ),
        )
    );
    */

    //Number of words for archive content
    $wp_customize->add_setting(
        'excerpt_word_length',
        array(
            'default' => '200',
            'sanitize_callback' => 'the_monday_sanitize_number',
        )
    );
    $wp_customize->add_control(
        'excerpt_word_length',
        array(
            'type' => 'number',
            'priority' => 6,            
            'label' => __( 'Archive Content Length', 'the-monday' ),
            'section' => 'the_monday_archive_setting',            
            'description'   => __( 'Set the length of archive content', 'the-monday' ),
            'input_attrs' => array(
                'min'   => 50,
                'max'   => 500,
                'step'  => 20,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),
        )
    );
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * default sidebar setting for all pages
      */
      
	$wp_customize->add_section(
        'the_monday_page_setting', 
        array(
    		'priority' => 4,
    		'title' => __('Page Settings', 'the-monday'),
    		'panel'=> 'the_monday_design_layout'
	       )
    );
    
    // Default layout for Page
	$wp_customize->add_setting(
        'the_monday_page_sidebar', 
        array(
    		'default' => 'right_sidebar',
            'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'the_monday_page_sidebar_sanitize'
	       )
    );

	$wp_customize->add_control( new The_Monday_Image_Radio_Control(
        $wp_customize, 
        'the_monday_page_sidebar', 
        array(
    		'type' => 'radio',
    		'label' => __( 'Available Sidebars', 'the-monday' ),
            'description' => __( 'Select sidebar for all pages unless unique layout is set for specific page.', 'the-monday' ),
    		'section' => 'the_monday_page_setting',
            'priority'       => 3,
    		'choices' => array(
        			'right_sidebar' => THE_MONDAY_ADMIN_IMAGES_URL . '/right-sidebar.png',
        			'left_sidebar' => THE_MONDAY_ADMIN_IMAGES_URL . '/left-sidebar.png',
        			'no_sidebar_full_width'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
        			'no_sidebar_content_centered'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
        		)
	       )
        )
    );
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * default sidebar setting for all Single Posts
      */
      
	$wp_customize->add_section(
        'the_monday_posts_settings', 
        array(
    		'priority' => 5,
    		'title' => __('Single Posts Settings', 'the-monday'),
    		'panel'=> 'the_monday_design_layout'
	       )
    );
    
    // Default layout for Page
	$wp_customize->add_setting(
        'the_monday_post_sidebar', 
        array(
    		'default' => 'right_sidebar',
            'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'the_monday_page_sidebar_sanitize'
	       )
    );

	$wp_customize->add_control( new The_Monday_Image_Radio_Control(
        $wp_customize, 
        'the_monday_post_sidebar', 
        array(
    		'type' => 'radio',
    		'label' => __( 'Available Sidebars', 'the-monday' ),
            'description' => __( 'Select sidebar for all Single Posts unless unique layout is set for specific post.', 'the-monday' ),
    		'section' => 'the_monday_posts_settings',
            'priority'       => 3,
    		'choices' => array(
        			'right_sidebar' => THE_MONDAY_ADMIN_IMAGES_URL . '/right-sidebar.png',
        			'left_sidebar' => THE_MONDAY_ADMIN_IMAGES_URL . '/left-sidebar.png',
        			'no_sidebar_full_width'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
        			'no_sidebar_content_centered'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
        		)
	       )
        )
    );
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * Post's Entry meta settings
      */
    /*  
	$wp_customize->add_section(
        'the_monday_entry_meta_setting', 
        array(
    		'priority' => 7,
    		'title' => __('Entry Meta Settings', 'the-monday'),
    		'panel'=> 'the_monday_design_layout'
	       )
    );
    
    // Show entry meta in archive pages
    $wp_customize->add_setting(
        'archive_meta_option',
        array(
            'default' => 'yes',
            'sanitize_callback' => 'the_monday_switch_option_yes_no',
            )
    );
    $wp_customize->add_control( new WP_Customize_Switch_Yesno_Control(
        $wp_customize, 
            'archive_meta_option', 
            array(
                'type' => 'yn_switch',
                'priority'  => 3,
                'label' => __( 'Option for Archive', 'the-monday' ),
                'description' => __( 'Choose option to show/hide Entry Meta(date/author/comments) in archive page, which reflected in archive, category, search page etc.', 'the-monday' ),
                'section' => 'the_monday_entry_meta_setting',
                'choices'   => array(
                    'yes' => __( 'Yes', 'the-monday' ),
                    'no' => __( 'No', 'the-monday' ),
                    ),
                )
        )
    );
    
    // Show entry meta in single post
    $wp_customize->add_setting(
        'single_post_meta_option',
        array(
            'default' => 'yes',
            'sanitize_callback' => 'the_monday_switch_option_yes_no',
            )
    );
    $wp_customize->add_control( new WP_Customize_Switch_Yesno_Control(
        $wp_customize, 
            'single_post_meta_option', 
            array(
                'type' => 'yn_switch',
                'priority'  => 3,
                'label' => __( 'Option for Single Post', 'the-monday' ),
                'description' => __( 'Choose option to show/hide Entry Meta(date/author/comments) in Single Page.', 'the-monday' ),
                'section' => 'the_monday_entry_meta_setting',
                'choices'   => array(
                    'yes' => __( 'Yes', 'the-monday' ),
                    'no' => __( 'No', 'the-monday' ),
                    ),
                )
        )
    );
    */
/*-------------------------------------------------------------------------------------------------------------------------------------------*/

    /**
      * Breadcrumbs Settings
      */
      
	$wp_customize->add_section(
        'the_monday_breadcrumbs_setting', 
        array(
    		'priority' => 8,
    		'title' => __( 'Breadcrumbs Settings', 'the-monday' ),
    		'panel'=> 'the_monday_design_layout'
	       )
    );
    
    // Show entry meta in archive pages
    $wp_customize->add_setting(
        'the_monday_breadcrumbs_option',
        array(
            'default' => 'yes',
            'sanitize_callback' => 'the_monday_switch_option_yes_no',
            )
    );
    $wp_customize->add_control( new WP_Customize_Switch_Yesno_Control(
        $wp_customize, 
            'the_monday_breadcrumbs_option', 
            array(
                'type' => 'yn_switch',
                'priority'  => 3,
                'label' => __( 'Option for Breadcrumbs', 'the-monday' ),
                'description' => __( 'Choose option to show/hide breadcrumbs.', 'the-monday' ),
                'section' => 'the_monday_breadcrumbs_setting',
                'choices'   => array(
                    'yes' => __( 'Yes', 'the-monday' ),
                    'no' => __( 'No', 'the-monday' ),
                    ),
                )
        )
    );
    
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
     /**
      * Custom Css section
      */
      
	$wp_customize->add_section(
        'the_monday_custom_css', 
        array(
    		'priority' => 9,
    		'title' => __('Custom Css', 'the-monday'),
    		'panel'=> 'the_monday_design_layout'
	       )
    );
    
    // Textarea for About us description.
    $wp_customize->add_setting(
        'custom_css_textarea',
        array(
            'default' => __( '', 'the-monday' ),
            'sanitize_callback' => 'esc_textarea',
            'transport' => 'postMessage'
            )
    );
    $wp_customize->add_control( new Textarea_Custom_Control(
        $wp_customize,
        'custom_css_textarea',
            array(
                'label' => __( 'Add your custom css code', 'the-monday' ),
                'priority' => 3,
                'section' => 'the_monday_custom_css'
                )
        )
    );
}