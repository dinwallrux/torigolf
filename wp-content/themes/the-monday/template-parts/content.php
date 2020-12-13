<?php
/**
 * Template part for displaying posts.
 *
 * @package The Monday
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php the_monday_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			$image_id = get_post_thumbnail_id();
			$image_path = wp_get_attachment_image_src( $image_id, 'the-monday-classic-blog-thumb', true );
			$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
		?>
			<div class="post-image-wrapper">
				<figure><img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" /></figure>
			</div>
		
		<div class="category-content">
			<?php the_monday_excerpt_word(); ?>
		</div>
		<a href="<?php the_permalink(); ?>" class="btn btn-blue"><?php _e( 'Read More', 'the-monday' ); ?></a>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-monday' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php the_monday_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
