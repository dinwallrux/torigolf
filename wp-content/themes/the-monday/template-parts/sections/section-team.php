<?php
/**
 * Template display the content of Our Team Members section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-team">
    <div class="tm-team-wrapper">
        <h2 class="tm-section-title team-title home-title"><?php echo esc_attr( get_theme_mod( 'team_section_title', __( 'Meet The Experts', 'the-monday' ) ) ); ?></h2>
        <?php
        $postsnum_type = get_theme_mod( 'team_posts_option', 'allposts' );
        if ( $postsnum_type == 'allposts' ) {
            $posts_per_page = -1;
        } else {
            $posts_per_page = get_theme_mod( 'team_posts_count', '6' );
        }
        $team_args = array(
            'post_type' => 'team-members',
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'order' => 'DESC'
        );
        $team_query = new WP_Query( $team_args );
        if ( $team_query->have_posts() ) {
            echo '<div id="team-slider"><ul class="bx-slider clear">';
            while ( $team_query->have_posts() ) {
                $team_query->the_post();
                $post_id = get_the_ID();
                $image_id = get_post_thumbnail_id();
                $image_path = wp_get_attachment_image_src( $image_id, 'medium', true );
                $image_alt = get_post_meta( $image_id, '_wp_attachement_image_alt', true );
                $member_position = get_post_meta( $post_id, 'ap_cpt_member_position', true );
                $member_fb_link = get_post_meta( $post_id, 'ap_cpt_member_fb_link', true );
                $member_tw_link = get_post_meta( $post_id, 'ap_cpt_member_tw_link', true );
                $member_gp_link = get_post_meta( $post_id, 'ap_cpt_member_gp_link', true );
                $member_lnk_link = get_post_meta( $post_id, 'ap_cpt_member_lnk_link', true );
                ?>
                <li>
                    <div class="member-image clearfix">
                        <figure>
                            <img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" title="<?php the_title(); ?>" />
                            <div class="member-social-links">
                                <div class="table-outer">
                                    <div class="table-inner">                                    
                                        <?php if ( !empty( $member_fb_link ) ) { ?><span class="fb"><a href="<?php echo esc_url( $member_fb_link ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></span><?php } ?>
                                        <?php if ( !empty( $member_tw_link ) ) { ?><span class="tw"><a href="<?php echo esc_url( $member_tw_link ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></span><?php } ?>
                                        <?php if ( !empty( $member_gp_link ) ) { ?><span class="gp"><a href="<?php echo esc_url( $member_gp_link ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></span><?php } ?>
                                        <?php if ( !empty( $member_lnk_link ) ) { ?><span class="lnk"><a href="<?php echo esc_url( $member_lnk_link ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></span><?php } ?>
                                    </div>
                                </div>
                            </div>
                        </figure>
    
                    </div>
                    <div class="member-info-wrapper">
                        <h3 class="member-name home-sub-title"><?php the_title(); ?></h3>
                        <span class="member-designation"><?php echo esc_attr( $member_position ); ?></span>
                        <div class="member-description"><?php the_content(); ?></div>
                    </div>            
                </li>
                <?php
            }
            echo '</ul></div>';
        }
        wp_reset_query();
        ?>
    </div>
</section>