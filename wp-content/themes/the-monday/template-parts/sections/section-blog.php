<?php
/**
 * Template display the content of Latest Blog section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-blog">
    <div class="section-blog-bg">
        <div class="tm-blog-section-wrapper">
            <h2 class="tm-section-title blog-title home-title"><?php echo esc_attr( get_theme_mod( 'blog_section_title', __( 'Latest From Blogs', 'the-monday' ) ) ); ?></h2>
            <div class="tm-section-posts-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="blog-main">
                            <div class="clearfix">
                                <?php
                                $blog_category = get_theme_mod( 'blog_category', '0' );
                                $blog_button_option = get_theme_mod( 'blog_more_posts_option', '' );
                                $blog_button_text = get_theme_mod( 'blog_more_button_title', 'More Posts' );
                                if ( !empty( $blog_category ) && $blog_category != '0' ) {
                                    $blog_args = array(
                                        'post_type' => 'post',
                                        'cat' => $blog_category,
                                        'post_status' => 'publish',
                                        'posts_per_page' => 4,
                                        'order' => 'DESC'
                                    );
                                    $blog_orderby = get_theme_mod( 'blog_posts_orderby', 'none' );
                                    $blog_order = get_theme_mod( 'blog_posts_order', 'desc' );
                                    if ( $blog_orderby == 'rand' ) {
                                        $blog_args['orderby'] = $blog_orderby;
                                    } elseif ( $blog_orderby == 'none' ) {
                                        $blog_args['order'] = $blog_order;
                                    } else {
                                        $blog_args['orderby'] = $blog_orderby;
                                        $blog_args['order'] = $blog_order;
                                    }
                                    $blog_query = new WP_Query( $blog_args );
                                    if ( $blog_query->have_posts() ) {
                                        while ( $blog_query->have_posts() ) {
                                            $blog_query->the_post();
                                            $image_id = get_post_thumbnail_id();
                                            $image_path = wp_get_attachment_image_src( $image_id, 'medium', true );
                                            $image_alt = get_post_meta( $image_id, '_wp_attachement_image_alt', true );
                                            ?>
                                            <div class="single-blog-wrapper">
                                                <div class="single-blog-wrapper-inner clearfix">
                                                    <div class="home-blog-image">
                                                        <?php if ( has_post_thumbnail() ) { ?>
                                                            <figure>
                                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                                    <img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" title="<?php the_title(); ?>" />
                                                                    <div class="home-blog-image-post">
                                                                        <div class="table-outer">
                                                                            <div class="table-inner">
                                                                                <div class="link">
                                                                                    <i class="fa fa-link"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </figure>
                                                        <?php } ?>

                                                    </div>
                                                    <div class="home-blog-desc">
                                                        <h3 class="blog-title"><?php the_title(); ?></h3>
                                                        <div class="blog-content"><?php the_excerpt(); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    $category_link = get_category_link( $blog_category );
                                ?>
                                    <div class="clear"></div>
                                    <?php if( $blog_button_option != 1 ) { ?>
                                        <div class="home-blog-read-more"><a href="<?php if( !empty( $category_link ) ){ echo esc_url( $category_link ); }?>"><?php echo esc_attr( $blog_button_text );?></a></div>
                                    <?php 
                                        } 
                                    wp_reset_query();
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>