<?php
/**
 * Template part for displaying single posts.
 *
 * @package The Monday
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php the_monday_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
    <?php
        $image_id = get_post_thumbnail_id();
        $image_path = wp_get_attachment_image_src( $image_id, 'the-monday-classic-blog-thumb', true );
        $image_alt = get_post_meta( $image_id, '_wp_attachement_image_alt', true );
    ?>
	<div class="entry-post-image single-post-image" itemprop="image">
        <figure><img src="<?php echo esc_url( $image_path[0] );?>" alt="<?php echo esc_attr( $image_alt ); ?>" title="<?php the_title(); ?>" /></figure>
    </div>
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
		<?php the_monday_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

