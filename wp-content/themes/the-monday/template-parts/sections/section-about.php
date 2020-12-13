<?php
/**
 * Template to display content of about us section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-about">
    <div class="tm-about-section-wrapper clear">
         <div class="tm-rightabout-wrapper">
                    <div class="about-us-post">
            <?php
                $right_page_id = get_theme_mod( 'about_page_right', '' );
                if( !empty( $right_page_id ) && $right_page_id != '0' ) {
                    $right_page_query = new WP_Query( 'page_id='.$right_page_id );
                    if( $right_page_query->have_posts() ) {
                        while( $right_page_query->have_posts() ) {
                            $right_page_query->the_post();
                            $image_id = get_post_thumbnail_id();
                            $image_path = wp_get_attachment_image_src( $image_id, 'the-monday-about-right', true );
                            $image_alt = get_post_meta( $image_id, '_wp_attachement_image_alt', true );
            ?>
                    <div class="rightpage-title-section">
                        <div class="rightpage-title-section-inner">
                                    <h2 class="rightpage-title tm-section-title home-title"><?php the_title(); ?></h2>                            
                        </div>
                    </div>
                    <div class="rightpage-image">
                        <figure><img src="<?php echo esc_url( $image_path[0] );?>" alt="<?php echo esc_attr( $image_alt );?>" /></figure>
                    </div>
                    <div class="rightpage-content">
                    <div class="rightpage-content-inner">
                                    <?php the_content();?>
                    </div>
                    </div>
            <?php
                        }
                    }
                    wp_reset_query();
                }
            ?>
        </div>
        </div>
        <div class="tm-leftabout-wrapper">
            <?php 
                $left_page_id = get_theme_mod( 'about_page_left', '' );
                if( !empty( $left_page_id ) && $left_page_id != '0' ) {
                    $left_page_query = new WP_Query( 'page_id='.$left_page_id );
                    if( $left_page_query->have_posts() ) {
                        while( $left_page_query->have_posts() ) {
                            $left_page_query->the_post();
                            $image_id = get_post_thumbnail_id();
                            $image_path = wp_get_attachment_image_src( $image_id, 'the-monday-about-left', true );
                            $image_alt = get_post_meta( $image_id, '_wp_attachement_image_alt', true ); 
            ?>
                    <?php if( has_post_thumbnail() ) { ?>
                    <div class="leftpage-image">
                        <figure><img src="<?php echo esc_url( $image_path[0] );?>" alt="<?php echo esc_attr( $image_alt );?>" /></figure>
                    </div>
                    <?php } ?>
                    <div class="leftpage-content-box-outer">
                    <div class="leftpage-content-box">
                    <div class="table-outer">
                    <div class="table-inner">
                        <h3 class="leftpage-title"><?php the_title();?></h3>
                        <div class="leftpage-content"><?php the_content();?></div>
                    </div>
                    </div>
                    </div>
                    </div>
            <?php
                        }
                    }
                    wp_reset_query();
                }
            ?>
        </div>       
    </div>
</section>