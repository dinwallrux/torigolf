<?php
/**
 * Template display the Product for Featured Product section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-featured_product">
    <div class="tm-feature-section-wrapper">
        <?php
        $product_args = array(
            'post_type' => 'products',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'order' => 'DESC'
        );
        $product_query = new WP_Query( $product_args );
        if ( $product_query->have_posts() ) {
            while ( $product_query->have_posts() ) {
                $product_query->the_post();
                $post_id = get_the_ID();
                $image_id = get_post_thumbnail_id();
                $image_path = wp_get_attachment_image_src( $image_id, 'full', true );
                $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                $product_features = get_post_meta( $post_id, 'product_feature', true );
                ?>
                <h2 class="tm-section-title tm-product-title home-title"><?php the_title(); ?></h2>
                <div class="tm-product-container clear">
                    <div class="tm-single-product-image">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <figure><img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" title="<?php the_title(); ?>" /></figure>
                        <?php } ?>
                    </div>
                    <div class="container clear">
                        <div class="tm-signle-product-wrap">
                            <?php
                            foreach ( $product_features as $feature ) {
                                $feature_name = $feature['feature_name'];
                                $feature_description = $feature['feature_description'];
                                $feature_icon = $feature['feature_icon'];
                                ?>      
                                <div class="tm-signle-product-wrap-single">
                                    <div class="tm-features_wrap">
                                        <div class="tm-features_wrap_outer">
                                            <div class="tm-features_wrap_inner">
                                                <div class="feature-name home-sub-title"><?php echo esc_attr( $feature_name ); ?></div>
                                                <div class="feature-description home-sub-title-desc"><?php echo esc_textarea( $feature_description ); ?></div>                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tm-feature-icon home-icon"><?php if ( !empty( $feature_icon ) ) { ?><span><i class="fa <?php echo esc_attr( $feature_icon ); ?>"></i></span><?php } ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        wp_reset_query();
        ?>
    </div>
</section>