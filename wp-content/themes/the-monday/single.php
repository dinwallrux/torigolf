<?php
/**
 * The template for displaying all single posts.
 *
 * @package The Monday
 */

get_header(); ?>
<div class="tm-page-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php the_monday_post_navigation(); ?>

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
	
</div><!--.tm-page-container-->
<?php get_footer(); ?>