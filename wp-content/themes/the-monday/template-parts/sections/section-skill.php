<?php
/**
 * Template display the content of skill section at home page
 * 
 * @package The Monday
 */
?>
<section class="tm-home-section" id="tm-section-skill">
    <div class="tm-skill-section-wrapper clear">    
        <div class="tm-section-info-wrapper">
            <div class="table-outer">
                <div class="table-inner">
                    <h2 class="tm-section-title skill-title home-title"><?php echo esc_attr( get_theme_mod( 'skill_section_title', __( 'We Have Got Skills', 'the-monday' ) ) ); ?></h2>
                    <div class="skill-description">
                        <?php echo esc_textarea( get_theme_mod( 'skill_section_description', __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'the-monday' ) ) ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tm-section-skills-wrapper">
            <?php
            $default_skill_title = array( __( '', 'the-monday' ), __( 'Web Design', 'the-monday' ), __( 'Html/Css', 'the-monday' ), __( 'Graphic Design', 'the-monday' ), __( 'UI/UX', 'the-monday' ), __( 'Coding', 'the-monday' ), __( 'Seo', 'the-monday' ) );
            $default_skill_percentage = array( __( '', 'the-monday' ), __( '90', 'the-monday' ), __( '75', 'the-monday' ), __( '70', 'the-monday' ), __( '85', 'the-monday' ), __( '70', 'the-monday' ), __( '100', 'the-monday' ) );
            for ( $i = 1; $i <= 6; $i++ ) {
                $skill_title = get_theme_mod( 'skill_title_' . $i, $default_skill_title[$i] );
                $skill_percentage = get_theme_mod( 'skill_percent_' . $i, $default_skill_percentage[$i] );
                ?>
                <div class="single-skill-wrapper">
                    <?php if ( !empty( $skill_percentage ) ) { ?>
                        <canvas class="loader skill-loader" data-percentage="<?php echo esc_attr( $skill_percentage );?>" color="#4b8cb3"></canvas>
                    <?php } ?>
                    <?php if ( !empty( $skill_title ) ) { ?>
                        <h3 class="tm-skill-title" id="show-skilltitle-<?php echo $i; ?>"><?php echo esc_attr( $skill_title ); ?></h3>
                    <?php } ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
 </section>