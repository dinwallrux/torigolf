<?php
/**
 * Template display the content of Testimonilas section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-testimonials">
    <div class="tm-testimonilas-wrapper-bg">
    <div class="tm-testimonilas-wrapper">
        <h2 class="tm-section-title testimonials-title home-title"><?php echo esc_attr( get_theme_mod( 'testimonials_section_title', __( "Let's Hear What Clients Say", 'the-monday' ) ) ); ?></h2>
        <?php
        $postsnum_type = get_theme_mod( 'testimonials_posts_option', 'allposts' );
        if ( $postsnum_type == 'allposts' ) {
            $posts_per_page = -1;
        } else {
            $posts_per_page = get_theme_mod( 'tesimonials_posts_count', '3' );
        }
        $tesitmonials_args = array(
            'post_type' => 'testimonials',
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'order' => 'DESC'
        );
        $tesitmonials_query = new WP_Query( $tesitmonials_args );
        if ( $tesitmonials_query->have_posts() ) {
            echo '<div id="testimonials-slider"><ul class="bx-slider">';
            while ( $tesitmonials_query->have_posts() ) {
                $tesitmonials_query->the_post();
                $post_id = get_the_ID();
                $image_id = get_post_thumbnail_id();
                $image_path = wp_get_attachment_image_src( $image_id, 'thumbnail', true );
                $image_alt = get_post_meta( $image_id, '_wp_attachement_image_alt', true );
                $author_position = get_post_meta( $post_id, 'ap_cpt_author_position', true );
                $author_company = get_post_meta( $post_id, 'ap_cpt_author_company', true );
                ?>
                <li>
                    <div class="author-image">
                        <figure><img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" title="<?php the_title(); ?>" /></figure>
                    </div>
                    <div class="author-info-wrapper">
                        <h3 class="author-name home-sub-title"><?php the_title(); ?></h3>
                        <span class="author-company">
                            <?php
                            echo esc_attr( $author_position );
                            if ( !empty( $author_company ) ) {
                                echo ', ' . esc_attr( $author_company );
                            }
                            ?>
                        </span>
                    </div>
                    <div class="author-content"><?php the_content(); ?></div>
                </li>
                <?php
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    </div>
</section>