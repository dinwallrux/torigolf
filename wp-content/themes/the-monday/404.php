<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package The Monday
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
			<div class="container">

				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'the-monday' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'the-monday' ); ?></p>

				</div><!-- .page-content -->
				</div>
			</section><!-- .error-404 -->


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
