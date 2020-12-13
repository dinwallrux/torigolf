<?php
/**
 * Template display the content of Portfolio Custom Post Type in Portfolio section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-portfolio">
    <div class="tm-home-portfolio-wrapper">
        <div class="container">
            <h2 class="tm-section-title portfolio-title home-title"><?php echo esc_attr( get_theme_mod( 'portfolio_section_title', __( 'What Have We Done So Far?', 'the-monday' ) ) ); ?></h2>
        </div>
        <?php
        $output = '';
        $categories = get_terms( 'portfolio_category' );
        if ( !empty( $categories ) ) {
            $output .= '<div class="portfolios-categories"><div class="container"><div class="clear">';
            $output .= '<ul class="protfolios-filter" id="filters"><li class="cat-item tm-catname active" id="cat-item-0"><a href="javascript:void(0)" data-filter="*">'. __( 'All', 'the-monday' ) .'</a></li>';
            foreach ( $categories as $category ) {
                $term_link = get_term_link( $category );
                $output .= '<li class="cat-item tm-catname" id="cat-item-' . esc_attr( $category->term_id ) . '"><a href="javascript:void(0)" data-filter=".' . esc_attr( $category->slug ) . '">' . esc_attr( $category->name ) . '</a></li>';
            }
            $output .= '</ul>';
            $output .= '</div></div></div>';
        }
        $output .= '<div class="row-portfolios fullwidth">';
        $output .= '<div class="projects-wrapper" id="protfolios-gallery-container" data-portfolio-effect="fadeInUp">';
        $portfolios_args = array(
            'post_type' => 'portfolios',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'DESC',
        );
        $portfolios_query = new WP_Query( $portfolios_args );
        if ( $portfolios_query->have_posts() ) {
            while ( $portfolios_query->have_posts() ) {
                $portfolios_query->the_post();
                $post_id = get_the_ID();
                $image_id = get_post_thumbnail_id();
                $image_path = wp_get_attachment_image_src( $image_id, 'the-monday-project-thumb', true );
                $image_alt = get_post_meta( $image_id, '_wp_attachement_image_alt', true );
                $term_list = wp_get_post_terms( $post_id, 'portfolio_category', array( "fields" => "all" ) );
                $termsString = '';
                foreach ( $term_list as $term ) {
                    $termsString .= $term->slug . ' ';
                }
                if ( has_post_thumbnail() ) {
                    $output .= '<div class="project-item item isotope-item ' . $termsString . '"><div class="project-item-inner">';
                    $output .= '<a class="project-pop" href="' . get_the_permalink() . '"><div class="table-outer"><div class="table-inner"><div class="link"><i class="fa fa-link"></i></div><div class="project-pop-content">'. get_the_title() .'</div></div></div></a>';
                    $output .= '<a class="project-img" href="' . get_the_permalink() . '"><img src="' . esc_url( $image_path[0] ) . '" alt="' . esc_attr( $image_alt ) . '" title="' . get_the_title() . '" /></a></div></div>';
                }
            }
        }
        $output .='</div>';
        $output .='</div>';
        echo $output;
        ?>
    </div>
</section>