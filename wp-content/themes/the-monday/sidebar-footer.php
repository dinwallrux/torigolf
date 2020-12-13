<?php
/**
 * The Sidebar containing the footer widget areas.
 * 
 * @package The Monday
 */
/**
 * If none of the sidebars have widgets, then let's bail early.
 */
if ( !is_active_sidebar( 'the_monday_footer_sidebar_one' ) &&
        !is_active_sidebar( 'the_monday_footer_sidebar_two' ) &&
        !is_active_sidebar( 'the_monday_footer_sidebar_three' ) &&
        !is_active_sidebar( 'the_monday_footer_sidebar_four' ) ) {
    return;
}

$the_monday_footer_layout = get_theme_mod( 'the_monday_footer_widget_option', 'widget_column3' );

?>
<div class="footer-widgets-wrapper">
    <div class="inner-wrap">
        <div class="footer-widgets-area <?php echo esc_attr( $the_monday_footer_layout ); ?> clear">
            <div class="footer-widgets-area-inner clear">
                <div class="container">
                    <div class="row">
                        <div class="tm-footer-widget clear">
                            <div class="tm-first-footer-widget tm-footer-widget-inner">
                            <div class="clear">
                                <?php
                                if (!dynamic_sidebar('the_monday_footer_sidebar_one')):
                                endif;
                                ?>
                            </div>                       
                            </div>                       
                            <div class="tm-second-footer-widget tm-footer-widget-inner" style="display: <?php if( $the_monday_footer_layout == 'widget_column1' ){ echo 'none'; } else { echo 'block'; }?>;">
                                <div class="clear">
                                <?php
                                if (!dynamic_sidebar('the_monday_footer_sidebar_two')):
                                endif;
                                ?>
                            </div>
                            </div>
                            <div class="tm-third-footer-widget tm-footer-widget-inner" style="display: <?php if( $the_monday_footer_layout == 'widget_column1' || $the_monday_footer_layout == 'widget_column2'){ echo 'none'; } else { echo 'block'; }?>;">
                            <div class="clear">                               
                                <?php
                                if (!dynamic_sidebar('the_monday_footer_sidebar_three')):
                                endif;
                                ?>
                            </div>
                            </div>
                            <div class="tm-fourth-footer-widget tm-footer-widget-inner" style="display: <?php if( $the_monday_footer_layout != 'widget_column4' ){ echo 'none'; } else { echo 'block'; }?>;">
                                <div class="clear">
                                <?php
                                if (!dynamic_sidebar('the_monday_footer_sidebar_four')):
                                endif;
                                ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>