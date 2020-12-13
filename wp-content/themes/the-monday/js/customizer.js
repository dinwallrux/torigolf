/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
    // Site title and description.
    	wp.customize( 'blogname', function( value ) {
    		value.bind( function( to ) {
    			$( '.site-title a' ).text( to );
                $( '.cp-sitename' ).html( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
    
    //Slider button text
    wp.customize( 'slider_button_text', function( value ) {
		value.bind( function( to ) {
			$( '.text-slider-section' ).find( '.button-header-slider a' ).text( to ) ;
		} );
	} );
	
    // Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
    
    //Site title
	wp.customize('site_title_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-title a').css('color', newval );
		} );
	});
	
    //Site desc
	wp.customize('site_desc_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-description').css('color', newval );
		} );
	});
    
    // Menu Tab Text
    wp.customize( 'about_section_menu_title', function( value ) {
		value.bind( function( to ) {
			$( '#about-menu-text a' ).text( to );
		} );
	} );
    
    wp.customize( 'services_section_menu_title', function( value ) {
		value.bind( function( to ) {
			$( '#services-menu-text a' ).text( to );
		} );
	} );
    
    wp.customize( 'team_section_menu_title', function( value ) {
		value.bind( function( to ) {
			$( '#team-menu-text a' ).text( to );
		} );
	} );
    
    wp.customize( 'testimonials_section_menu_title', function( value ) {
		value.bind( function( to ) {
			$( '#testimonials-menu-text a' ).text( to );
		} );
	} );
    
    wp.customize( 'portfolio_section_menu_title', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio-menu-text a' ).text( to );
		} );
	} );
    
    wp.customize( 'clients_section_menu_title', function( value ) {
		value.bind( function( to ) {
			$( '#clients-menu-text a' ).text( to );
		} );
	} );
    
    wp.customize( 'blog_section_menu_title', function( value ) {
		value.bind( function( to ) {
			$( '#blog-menu-text a' ).text( to );
		} );
	} );
    
    wp.customize( 'price_tables_section_menu_title', function( value ) {
		value.bind( function( to ) {
			$( '#price_tables-menu-text a' ).text( to );
		} );
	} );
    
    wp.customize( 'footer_contact_section_menu_title', function( value ) {
		value.bind( function( to ) {
			$( '#footer_contact-menu-text a' ).text( to );
		} );
	} );
    
    //Slider button text
    wp.customize( 'slider_button_text', function( value ) {
		value.bind( function( to ) {
			$( '.button-header-slider a' ).text( to );
		} );
	} );   
    
    
    //Services section
	wp.customize( 'service_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.services-title' ).html( to );
		} );
	} );
    
    //Team Member section
	wp.customize( 'team_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.team-title' ).html( to );
		} );
	} );
    
    //Testimonials
    wp.customize( 'testimonials_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.testimonials-title' ).html( to );
		} );
	} );
    
    //Static counter section    
    wp.customize( 'static_counter_icon_1', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-1' ).find( 'i' ).attr( 'class', 'fa '+to );
        } );
    } );
    
    wp.customize( 'static_counter_icon_2', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-2' ).find( 'i' ).attr( 'class', 'fa '+to );
        } );
    } );
    
    wp.customize( 'static_counter_icon_3', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-3' ).find( 'i' ).attr( 'class', 'fa '+to );
        } );
    } );
    
    wp.customize( 'static_counter_icon_4', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-4' ).find( 'i' ).attr( 'class', 'fa '+to );
        } );
    } );
    
    wp.customize( 'static_counter_icon_5', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-5' ).find( 'i' ).attr( 'class', 'fa '+to );
        } );
    } );
    
    wp.customize( 'static_counter_number_1', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-1' ).find( '.ap-stat_counter-number' ).html( to );
        } );
    } );

    wp.customize( 'static_counter_number_2', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-2' ).find( '.ap-stat_counter-number' ).html( to );
        } );
    } );

    wp.customize( 'static_counter_number_3', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-3' ).find( '.ap-stat_counter-number' ).html( to );
        } );
    } );

    wp.customize( 'static_counter_number_4', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-4' ).find( '.ap-stat_counter-number' ).html( to );
        } );
    } );

    wp.customize( 'static_counter_number_5', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-5' ).find( '.ap-stat_counter-number' ).html( to );
        } );
    } );
    
    wp.customize( 'static_counter_title_1', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-1' ).find( '.tm-stat_counter-title' ).html( to );
        } );
    } );

    wp.customize( 'static_counter_title_2', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-2' ).find( '.tm-stat_counter-title' ).html( to );
        } );
    } );

    wp.customize( 'static_counter_title_3', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-3' ).find( '.tm-stat_counter-title' ).html( to );
        } );
    } );

    wp.customize( 'static_counter_title_4', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-4' ).find( '.tm-stat_counter-title' ).html( to );
        } );
    } );

    wp.customize( 'static_counter_title_5', function( value )  {
        value.bind( function( to )  {
            $( '#counter-post-5' ).find( '.tm-stat_counter-title' ).html( to );
        } );
    } );

    //Portfolio section
    wp.customize( 'portfolio_section_title', function( value )  {
        value.bind( function( to )  {
            $( '.portfolio-title' ).html( to );
        } );
    } );

    //Skill Section
    wp.customize( 'skill_section_title', function( value )  {
        value.bind( function( to )  {
            $( '.skill-title' ).html( to );
        } );
    } );

    wp.customize( 'skill_section_description', function( value )  {
        value.bind( function( to )  {
            $( '.skill-description' ).html( to );
        } );
    } );

    
    wp.customize( 'skill_title_1', function( value )  {
        value.bind( function( to )  {
            $( '#show-skilltitle-1' ).html( to );
        } );
    } );

    wp.customize( 'skill_percent_1', function( value )  {
        value.bind( function( to )  {
            $( '#show-skillpercent-1' ).html( to );
        } );
    } );

    wp.customize( 'skill_title_2', function( value )  {
        value.bind( function( to )  {
            $( '#show-skilltitle-2' ).html( to );
        } );
    } );

    wp.customize( 'skill_percent_2', function( value )  {
        value.bind( function( to )  {
            $( '#show-skillpercent-2' ).html( to );
        } );
    } );

    wp.customize( 'skill_title_3', function( value )  {
        value.bind( function( to )  {
            $( '#show-skilltitle-3' ).html( to );
        } );
    } );

    wp.customize( 'skill_percent_3', function( value )  {
        value.bind( function( to )  {
            $( '#show-skillpercent-3' ).html( to );
        } );
    } );

    wp.customize( 'skill_title_4', function( value )  {
        value.bind( function( to )  {
            $( '#show-skilltitle-4' ).html( to );
        } );
    } );

    wp.customize( 'skill_percent_4', function( value )  {
        value.bind( function( to )  {
            $( '#show-skillpercent-4' ).html( to );
        } );
    } );

    wp.customize( 'skill_title_5', function( value )  {
        value.bind( function( to )  {
            $( '#show-skilltitle-5' ).html( to );
        } );
    } );

    wp.customize( 'skill_percent_5', function( value )  {
        value.bind( function( to )  {
            $( '#show-skillpercent-5' ).html( to );
        } );
    } );

    wp.customize( 'skill_title_6', function( value )  {
        value.bind( function( to )  {
            $( '#show-skilltitle-6' ).html( to );
        } );
    } );

    wp.customize( 'skill_percent_6', function( value )  {
        value.bind( function( to )  {
            $( '#show-skillpercent-6' ).html( to );
        } );
    } );
    
    //Our Clients
    
    wp.customize( 'client_section_title', function( value )  {
        value.bind( function( to )  {
            $( '.clients-title' ).html( to );
        } );
    } );
    
     //Display option for Posts option in our team section
    
    /* var radioOption = $('#customize-control-team_posts_option').find('input[type="radio"]:checked').val();
     alert(radioOption);
     if( radioOption == 'countposts' ){
         $('#customize-control-team_posts_count').show();
     } else{
        $('#customize-control-team_posts_count').hide();
     }
    $('#customize-control-team_posts_option').on('change',function(){
        var radioOption = $(this).find('input[type="radio"]:checked').val();
        alert(radioOption);
        if(radioOption == 'countposts'){
            $('#customize-control-team_posts_count').show('swing');
        } else {
            $('#customize-control-team_posts_count').hide('swing');
        }
    });
    
    
    wp.customize( 'team_posts_option', function( value )  {
        value.bind( function( to )  {
            $( '.clients-title' ).html( to );
        } );
    } );
    */ 
    
    //Blog section
    wp.customize( 'blog_section_title', function( value )  {
        value.bind( function( to )  {
            $( '.blog-title' ).html( to );
        } );
    } );
    
    wp.customize( 'blog_more_button_title', function( value )  {
        value.bind( function( to )  {
            $( '.home-blog-read-more > a' ).html( to );
        } );
    } );
    
    //Price Table
    wp.customize( 'price_tables_section_title', function( value )  {
        value.bind( function( to )  {
            $( '.priceing-title' ).html( to );
        } );
    } );
    
    // footer contact
    wp.customize( 'footer_contact_section_title', function( value )  {
        value.bind( function( to )  {
            $( '.footer-contact-title' ).html( to );
        } );
    } );
    
    
    
} )( jQuery );