<?php
/**
 * The Monday types sanitization and definitions 
 * 
 * @package The Monday
 */
     
    //Header type
    function the_monday_sanitize_layout( $input ) {
        $valid = array(
            'slider'    => __('Full screen slider', 'the-monday'),
            'image'     => __('Image', 'the-monday'),
            'nothing'   => __('Nothing (only menu)', 'the-monday')
        );
     
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }
    
    //Inner Header type
    function the_monday_sanitize_inner_layout( $input ) {
        $valid = array(
            'image'     => __('Image', 'the-monday'),
            'nothing'   => __('Nothing (only menu)', 'the-monday')
        );
     
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }

    
    //Text
    function the_monday_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }
    
    // Number
    function the_monday_sanitize_number( $input ) {
        $output = intval($input);
         return $output;
    }  
    
    //Background size
    function the_monday_sanitize_bg_size( $input ) {
        $valid = array(
            'cover'     => __( 'Cover', 'the-monday' ),
            'contain'   => __( 'Contain', 'the-monday' ),
        );
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }
    
    
    //Footer widget areas
    function the_monday_sanitize_fw( $input ) {        
        $valid = array(
            '1'     => __( 'One', 'the-monday' ),
            '2'     => __( 'Two', 'the-monday' ),
            '3'     => __( 'Three', 'the-monday' ),
            '4'     => __( 'Four', 'the-monday' )
        );
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }
    
    // site layout
    function the_monday_sanitize_site_layout($input) {
        $valid_keys = array(
            'boxed_layout' => __( 'Boxed Layout', 'the-monday' ),
            'wide_layout' => __( 'Wide Layout', 'the-monday' )
            );
        if ( array_key_exists( $input, $valid_keys ) ) {
            return $input;
        } else {
            return '';
        }
   }
   
   // Our Services layout
   function the_monday_sanitize_service_layout( $input ) {
        $valid_keys = array(
            'column' => __( 'Column View', 'the-monday' ),
            'list' => __( 'List View', 'the-monday' ),
            );
        if( array_key_exists( $input, $valid_keys ) ) {
            return $input;
        } else {
            return '';
        }
   }
   
   // Switch option
   function the_monday_switch_option( $input ) {
        $valid_keys = array(
            'enable' => __( 'Enable', 'the-monday' ),
            'disable' => __( 'Disable', 'the-monday' )
            );
        if ( array_key_exists( $input, $valid_keys ) ) {
            return $input;
        } else {
            return '';
        }
   }
   
   //Posts orderby
    function the_monday_posts_orderby( $input ) {
        $valid = array(
            'none' => __( 'None', 'the-monday' ),
            'title' => __( 'Title', 'the-monday' ),
            'date' => __( 'Date', 'the-monday' ),
            'rand' => __( 'Random', 'the-monday' )
        );
     
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }
    
    //Posts order
    function the_monday_posts_order( $input ) {
        $valid = array(
            'DESC' => __( 'Descending', 'the-monday' ),
            'ASC' => __( 'Ascending', 'the-monday' )
        );
     
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }
   
   // Switch option Yes/No
   function the_monday_switch_option_yes_no( $input ) {
        $valid_keys = array(
            'yes' => __( 'Yes', 'the-monday' ),
            'no' => __( 'No', 'the-monday' )
            );
        if ( array_key_exists( $input, $valid_keys ) ) {
            return $input;
        } else {
            return '';
        }
   }
    //Sticky menu
    function the_monday_sanitize_sticky( $input ) {
        $valid = array(
            'sticky'     => __( 'Sticky', 'the-monday' ),
            'static'   => __( 'Static', 'the-monday' ),
        );
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }


    //Blog Layout
    function the_monday_sanitize_blog( $input ) {
        $valid = array(
            'classic'    => __( 'Classic', 'the-monday' ),
            'fullwidth'  => __( 'Full width (no sidebar)', 'the-monday' ),
            'masonry-layout'    => __( 'Masonry (grid style)', 'the-monday' )
    
        );
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }


    //Menu style
    function the_monday_sanitize_menu_style( $input ) {
        $valid = array(
            'inline'     => __( 'Inline', 'the-monday' ),
            'centered'   => __( 'Centered (menu and site logo)', 'the-monday' ),
        );
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }


    //Checkboxes
    function the_monday_sanitize_checkbox( $input ) {
        if ( $input == 1 ) {
            return 1;
        } else {
            return '';
        }
    }
    
    //Posts per page option
    function the_monday_posts_perpage_option( $input ) {
        $valid = array(
            'allposts' => __( 'All Posts', 'the-monday' ),
            'countposts' => __( 'Numbers of Posts', 'the-monday' )
        );
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }
    
    //Archive Layout
    function the_monday_archive_layout_sanitize( $input ) {
        $valid = array(
            'classic' => __( 'Classic', 'the-monday' ),
            'grid' => __( 'Grid Style', 'the-monday' )
        );
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    } 
    
    //Blog page Layout
    function the_monday_blog_page_layout_sanitize( $input ) {
        $valid = array(
            'classic' => __( 'Classic', 'the-monday' ),
            'grid' => __( 'Grid Style', 'the-monday' )
        );
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }    
    
    //Design layout for post/page/archvie
    function the_monday_page_sidebar_sanitize($input) {
   	$valid_keys = array(
            'right_sidebar' => THE_MONDAY_ADMIN_IMAGES_URL . '/right-sidebar.png',
			'left_sidebar' => THE_MONDAY_ADMIN_IMAGES_URL . '/left-sidebar.png',
			'no_sidebar_full_width'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
			'no_sidebar_content_centered'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
   
     //Footer widget layout
    function the_monday_footer_layout_sanitize($input) {
   	$valid_keys = array(
            'widget_column4' => THE_MONDAY_ADMIN_IMAGES_URL . '/footer-4.png',
			'widget_column3' => THE_MONDAY_ADMIN_IMAGES_URL . '/footer-3.png',
			'widget_column2'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/footer-2.png',
			'widget_column1'	=> THE_MONDAY_ADMIN_IMAGES_URL . '/footer-1.png'
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
   
   function __return_false_value($value) {
        return $value;
    }    
    add_filter('__return_false', '__return_false_value');

    /**
     * Call back function
     */

    function team_post_count_callback( $control ) {
        if ( $control->manager->get_setting('team_posts_option')->value() == 'countposts' ) {
            return true;
        } else {
            return false;
        }
    }

    function testimonials_post_count_callback( $control ) {
        if ( $control->manager->get_setting('testimonials_posts_option')->value() == 'countposts' ) {
            return true;
        } else {
            return false;
        }
    }
    
    function clients_post_count_callback( $control ) {
        if ( $control->manager->get_setting('clients_posts_option')->value() == 'countposts' ) {
            return true;
        } else {
            return false;
        }
    }

    function service_post_order_callback( $control ) {
        if ( $control->manager->get_setting('services_posts_orderby')->value() == 'rand' ) {
            return false;
        } else {
            return true;
        }
    }

    function blog_post_order_callback( $control ) {
        if ( $control->manager->get_setting('blog_posts_orderby')->value() == 'rand' ) {
            return false;
        } else {
            return true;
        }
    }