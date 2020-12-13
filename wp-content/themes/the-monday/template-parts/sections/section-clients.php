<?php
/**
 * Template to display content of Our Clients section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-clients">
    <div class="tm-clients-section-wrapper">
        <h2 class="tm-section-title clients-title home-title"><?php echo esc_attr( get_theme_mod( 'client_section_title', __( 'Our Valuable Clients', 'the-monday' ) ) ); ?></h2>
        <div class="clients-logo-wrapper" id="clients-slider">
            <div class="container clear">
                <?php
                $posts_value_type = get_theme_mod( 'clients_posts_option', 'allposts' );
                if ( $posts_value_type == 'allposts' ) {
                    $posts_per_page = -1;
                } elseif ( $posts_value_type == 'countposts' ) {
                    $posts_per_page = get_theme_mod( 'clients_posts_count', '6' );
                }
                $clients_args = array(
                    'post_type' => 'clients',
                    'post_status' => 'publish',
                    'posts_per_page' => $posts_per_page,
                    'order' => 'DESC'
                );
                $clients_query = new WP_Query( $clients_args );
                if ( $clients_query->have_posts() ) {
                    echo '<ul class="bx-slider">';
                    while ( $clients_query->have_posts() ) {
                        $clients_query->the_post();
                        $post_id = get_the_ID();
                        $image_id = get_post_thumbnail_id();
                        $image_path = wp_get_attachment_image_src( $image_id, 'thumbnail', true );
                        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                        $client_custom_url = get_post_meta( $post_id, 'ap_cpt_clients_custom_link', true );
                        if ( has_post_thumbnail() ) {
                            ?>
                            <li>
                                <figure>
                                    <?php if ( !empty( $client_custom_url ) ) { ?>
                                        <a href="<?php echo esc_url( $client_custom_url ); ?>" target="_blank">
                                        <?php } ?>
                                    <img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" title="<?php the_title(); ?>" /></figure>
                                <?php if ( !empty( $client_custom_url ) ) { ?>
                                    </a>
                                <?php } ?>
                            </li>
                            <?php
                        }
                    }
                    echo '</ul>';
                }
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</section>