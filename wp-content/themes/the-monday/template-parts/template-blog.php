<?php
/**
 * Template Name: Blog Page
 *
 * This is the template that displays all posts .
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package The Monday
 */

get_header(); ?>
<div class="tm-page-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="blog-layout-wrapper">
                        <?php
                            $the_monday_blog_page_layout = get_theme_mod( 'the_monday_blog_page_layout', 'classic' ); 
                            //get_template_part( 'template-parts/content-blog', $the_monday_blog_page_layout ); 
                            get_template_part( 'template-parts/content-blog-classic' ); 
                        ?>
                    </div>
            	<footer class="entry-footer">
            		<?php //edit_post_link( esc_html__( 'Edit', 'the-monday' ), '<span class="edit-link">', '</span>' ); ?>
            	</footer><!-- .entry-footer -->
            </article><!-- #post-## -->

            <?php
				// If comments are open or we have at least one comment, load up the comment template.
				/*if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;*/
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php the_monday_get_sidebar(); ?>
</div><!--.tm-page-container-->
<?php get_footer(); ?>
