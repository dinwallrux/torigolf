<?php
/**
 * Template display the content of Footer contact section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-footer-section" id="tm-section-footer_contact">
    <div class="tm-footer-contact-wrapper">
        <h2 class="tm-section-title footer-contact-title home-title"><?php echo esc_attr( get_theme_mod( 'footer_contact_section_title', __( 'Get In Touch', 'the-monday' ) ) ); ?></h2>
        <div class="contact-info-wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    $default_contact_icon = array( '', 'fa-map-marker', 'fa-envelope', 'fa-phone', 'fa-fax' );
                    $default_contact_title = array( __( '', 'the-monday' ), __( 'Located In', 'the-monday' ), __( 'Mail Us &#64;', 'the-monday' ), __( 'Call Us on', 'the-monday' ), __( 'Fax Us', 'the-monday' ) );
                    $default_contact_info = array( __( '', 'the-monday' ), __( 'Mathuri Sadan, 5th floor Ravi Bhawan, Kathmandu, Nepal', 'the-monday' ), __( 'info@accesspressthemes.com', 'the-monday' ), __( '+977 989545212', 'the-monday' ), __( '+977 984545212', 'the-monday' ) );
                    for ($i = 1; $i <= 4; $i++) {
                        $contact_icon = get_theme_mod( 'footer_contact_icon_' . $i, $default_contact_icon[$i] );
                        $contact_title = get_theme_mod( 'footer_contact_title_' . $i, $default_contact_title[$i] );
                        $contact_info = get_theme_mod( 'footer_contact_info_' . $i, $default_contact_info[$i] );
                        ?>
                        <div class="fc-single-info">
                            <?php if ( !empty( $contact_icon ) ) { ?><span class="fc-contact-icon"><i class="fa <?php echo esc_attr( $contact_icon ); ?>"></i></span><?php } ?>
                            <?php if ( !empty( $contact_title ) ) { ?><span class="fc-contact-title"><?php echo esc_attr( $contact_title ); ?></span><?php } ?>
                            <?php if ( !empty( $contact_info ) ) { ?><span class="fc-contact-info"><?php echo esc_attr( $contact_info ); ?></span><?php } ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="fc-contact-map">
        <?php
        if ( is_active_sidebar( 'the_monday_footer_map' ) ) {
            if ( !dynamic_sidebar( 'the_monday_footer_map' ) ):
            endif;
        }
        ?>
    </div>
    <div class="clearfix"></div>
 </section>