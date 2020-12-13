<?php
/**
 * Template display the Static Counter section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-counter">
    <div class="tm-stat-counter-wrapper clear">
        <?php
        $default_counter_icon = array( __( '', 'the-monday' ), __( "fa-code", "the-monday" ), __( 'fa-beer', 'the-monday' ), __( 'fa-rocket', 'the-monday' ), __( 'fa-trophy', 'the-monday' ), __( 'fa-shopping-cart', 'the-monday' ) );
        $default_counter_number = array( '', '76294', '40', '350', '72', '537' );
        $default_counter_title = array( __( '', 'the-monday' ), __( 'Lines of Code', 'the-monday' ), __( 'Mugs of Beer', 'the-monday' ), __( 'Completed Projects', 'the-monday' ), __( 'Awards Achieved', 'the-monday' ), __( 'Purchases', 'the-monday' ) );
        $array_counter = count( $default_counter_icon );
        for ( $i = 1; $i < $array_counter; $i++ ) {
            ?>
            <div class="counter-wrapper" id="counter-post-<?php echo $i; ?>">
                <?php
                $counter_icon = get_theme_mod( 'static_counter_icon_' . $i, $default_counter_icon[$i] );
                if ( !empty( $counter_icon ) ) {
                    echo '<div class="tm-stat_counter-icon"><div class="table-outer"><div class="table-inner"> <i class="fa ' . esc_attr( $counter_icon ) . '"></i>' . '</div></div></div>';
                }
                $counter_number = get_theme_mod( 'static_counter_number_' . $i, $default_counter_number[$i] );
                if ( !empty($counter_number ) ) {
                    echo '<div class="tm-stat_counter-number"><span class="counter">' . esc_attr( $counter_number ) . '</span></div>';
                }
                $counter_title = get_theme_mod( 'static_counter_title_' . $i, $default_counter_title[$i] );
                if ( !empty( $counter_title ) ) {
                    echo '<h5 class="tm-stat_counter-title">' . esc_attr( $counter_title ) . '</h5>';
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</section>