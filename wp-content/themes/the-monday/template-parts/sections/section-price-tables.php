<?php
/**
 * Template display the content of Latest Blog section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-price_tables">
    <div class="tm-pricing-section-wrapper">
        <h2 class="tm-section-title priceing-title home-title"><?php echo esc_attr( get_theme_mod( 'price_tables_section_title', __( 'Chose Your Plan', 'the-monday' ) ) ); ?></h2>
        <div class="tm-section-posts-wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    $table_args = array(
                        'post_type' => 'price-table',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'order' => 'DESC'
                    );
                    $table_query = new WP_Query( $table_args );
                    if ( $table_query->have_posts() ) {
                        while ( $table_query->have_posts() ) {
                            $table_query->the_post();
                            $post_id = get_the_ID();
                            $table_tag = get_post_meta( $post_id, 'table_tag', true );
                            $table_price = get_post_meta( $post_id, 'table_price', true );
                            $table_price_per = get_post_meta( $post_id, 'table_price_per', true );
                            $table_button_link = get_post_meta( $post_id, 'table_button_link', true );
                            $table_button_text = get_post_meta( $post_id, 'table_button_text', true );
                            ?>
                            <div class="single-price-table-wrapper">
                                <span class="price-check"><i class="fa fa-check"></i></span>
                                <div class="single-price-table-wrapper-inner">
                                    <div class="table-title-price-outer">
                                        <div class="table-title-price">
                                            <h3 class="table-title"><?php the_title(); ?></h3>
                                            <?php if ( !empty( $table_tag ) ) { ?><span class="table-tag-outer"><span class="table-tag"><?php echo esc_attr( $table_tag ); ?></span></span><?php } ?>
                                            <div class="table-price-wrapper">
                                                <?php if ( !empty( $table_price ) ) { ?>
                                                    <span class="table-currencty"><?php _e( '$', 'the-monday' ); ?></span>
                                                    <span class="table-price"><?php echo esc_attr( $table_price ); ?></span>
                                                <?php } ?>
                                                <?php if ( !empty( $table_price_per ) ) { ?><span class="table-price-per"><?php echo esc_attr( $table_price_per ); ?></span><?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-features-wrapper">
                                        <?php
                                        $table_feature = get_post_meta( $post->ID, 'table_feature', true );
                                        if ( !empty( $table_feature ) ) {
                                            foreach ( $table_feature as $key => $value ) {
                                                ?>
                                                <div class="signle-feature"><?php echo esc_attr( $value['pricing_feature'] ); ?></div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="table-button">
                                        <a class="table-button button-link" href="<?php
                                           if ( !empty( $table_button_link ) ) {
                                               echo esc_url( $table_button_link );
                                           } else {
                                               '#';
                                           }
                                           ?>" title="<?php the_title(); ?>">
                                               <?php
                                               if ( !empty( $table_button_text ) ) {
                                                   echo esc_attr( $table_button_text );
                                               }
                                               ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>