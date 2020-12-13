<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package The Monday
 */

?>

<div id="secondary" class="widget-area" role="complementary">
    <?php 
        do_action( 'the_monday_before_sidebar' );
        
        if( is_page_template( 'template-parts/template-contact.php' ) ) {
			$sidebar = 'contact_page_sidebar';
		} else {
			$sidebar = 'right_sidebar';
		}
        
        if ( ! dynamic_sidebar( $sidebar ) ) {
            if( $sidebar == 'contact_page_sidebar' ) {
                $sidebar_name = __( 'Contact Page', 'the-monday' );
            } else {
                $sidebar_name = __( 'Right', 'the-monday' );
            }
        
        
            the_widget( 'WP_Widget_Text',
                array(
                   'title'  => __( 'Example Widget', 'the-monday' ),
                   'text'   => sprintf( __( 'This is an example widget to show how the %s Sidebar looks by default. You can add custom widgets from the %swidgets screen%s in the admin. If custom widgets is added than this will be replaced by those widgets.', 'the-monday' ), $sidebar_name, current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
                   'filter' => true,
                ),
                array(
                   'before_widget' => '<aside class="widget widget_text clearfix">',
                   'after_widget'  => '</aside>',
                   'before_title'  => '<h3 class="widget-title"><span>',
                   'after_title'   => '</span></h3>'
                )
             );
        } 
    ?>
    
	<?php do_action( 'the_monday_after_sidebar' ); ?>
</div><!-- #secondary -->
