<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that display content of Contact page.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package The Monday
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                	<header class="entry-header">
                		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                	</header><!-- .entry-header -->
                
                	<div class="entry-content">
                		<?php the_content(); ?>
                		<?php
                			wp_link_pages( array(
                				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-monday' ),
                				'after'  => '</div>',
                			) );
                		?>
                	</div><!-- .entry-content -->
                
                	<footer class="entry-footer">
                		<?php edit_post_link( esc_html__( 'Edit', 'the-monday' ), '<span class="edit-link">', '</span>' ); ?>
                	</footer><!-- .entry-footer -->
                </article><!-- #post-## -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php the_monday_get_sidebar(); ?>
<?php get_footer(); ?>
