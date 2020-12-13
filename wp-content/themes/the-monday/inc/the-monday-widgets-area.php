<?php
/**
 * Template file for all widget area
 * 
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 * 
 * @package The Monday
 */

/**
 * Define widget area 
 */
  
function the_monday_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'the-monday' ),
		'id'            => 'right_sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'the-monday' ),
		'id'            => 'left_sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
   
    register_sidebar( array(
       'name'            => __( 'Contact Page Sidebar', 'the-monday' ),
       'id'              => 'contact_page_sidebar',
       'description'     => __( 'Shows widgets on Contact Page Template.', 'the-monday' ),
       'before_widget'   => '<aside id="%1$s" class="widget %2$s clearfix">',
       'after_widget'    => '</aside>',
       'before_title'    => '<h1 class="widget-title">',
       'after_title'     => '</h1>'
    ) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Front Page: Subscribe Section', 'the-monday' ),
		'id'            => 'the_monday_subscribe',
		'description'   => esc_html__( 'Content Subscribe Today Section', 'the-monday' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Front Page: Call to Action (Style 1)', 'the-monday' ),
		'id'            => 'the_monday_cta_s1',
		'description'   => esc_html__( 'Content about call to action (style 1)', 'the-monday' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Front Page: Call to Action (Style 2)', 'the-monday' ),
		'id'            => 'the_monday_cta_s2',
		'description'   => esc_html__( 'Content about call to action (style 2)', 'the-monday' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer: Contact Map', 'the-monday' ),
		'id'            => 'the_monday_footer_map',
		'description'   => esc_html__( 'Content about footer map section', 'the-monday' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer: Sidebar one', 'the-monday' ),
		'id'            => 'the_monday_footer_sidebar_one',
		'description'   => esc_html__( 'Content about footer sidebar one', 'the-monday' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer: Sidebar two', 'the-monday' ),
		'id'            => 'the_monday_footer_sidebar_two',
		'description'   => esc_html__( 'Content about footer sidebar two', 'the-monday' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer: Sidebar three', 'the-monday' ),
		'id'            => 'the_monday_footer_sidebar_three',
		'description'   => esc_html__( 'Content about footer sidebar three', 'the-monday' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer: Sidebar four', 'the-monday' ),
		'id'            => 'the_monday_footer_sidebar_four',
		'description'   => esc_html__( 'Content about footer sidebar four', 'the-monday' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer: Social Icons', 'the-monday' ),
		'id'            => 'the_monday_footer_social_icons',
		'description'   => esc_html__( 'Content about footer Social icons', 'the-monday' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'the_monday_widgets_init' );