<?php
/**
 * Template display the content of Our services section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-services" >
    <div class="tm-servies-section-wrapper">
        <h2 class="tm-section-title services-title home-title"><?php echo esc_attr( get_theme_mod( 'service_section_title', __( 'Our Services', 'the-monday' ) ) ); ?></h2>
        <div class="tm-section-posts-wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    $services_args = array(
                        'post_type' => 'services',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                    );
                    $services_orderby = get_theme_mod( 'services_posts_orderby', 'none' );
                    $services_order = get_theme_mod( 'services_posts_order', 'desc' );
                    if ( $services_orderby == 'rand' ) {
                        $services_args['orderby'] = $services_orderby;
                    } elseif ( $services_orderby == 'none' ) {
                        $services_args['order'] = $services_order;
                    } else {
                        $services_args['orderby'] = $services_orderby;
                        $services_args['order'] = $services_order;
                    }
                    $services_query = new WP_Query( $services_args );
                    if ( $services_query->have_posts() ) {
                        while ( $services_query->have_posts() ) {
                            $services_query->the_post();
                            $post_id = get_the_ID();
                            $service_icon = get_post_meta( $post_id, 'ap_cpt_service_icon', true );
                            $service_custom_link = get_post_meta( $post_id, 'ap_cpt_service_link', true );
                            ?>
                            <div class="service-signle-post-wrapper">
                                <?php if ( !empty( $service_icon ) ) { ?><span class="service-icon home-icon"><i class="fa <?php echo esc_attr( $service_icon ); ?>"></i></span><?php } ?>
                                <h3 class="service-title home-sub-title">
                                    <?php if ( !empty( $service_custom_link ) ) { ?>
                                        <a href="<?php echo esc_url( $service_custom_link ); ?>"><?php the_title(); ?></a>
                                    <?php } else {
                                        the_title();
                                    } ?>
                                </h3>
                                <div class="service-excerpt home-sub-title-desc"><?php the_excerpt(); ?></div>
                            </div>
                            <?php
                        }
                    }
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>