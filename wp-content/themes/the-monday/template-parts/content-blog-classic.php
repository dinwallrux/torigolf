<?php
/**
 * Classic blog layout
 * 
 * @package The Monday
 */
    global $the_monday_default_posts_per_page; 
    $the_monday_blog_cats = get_theme_mod( 'blog_exclude_categories' );    
    $the_monday_paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $blog_page_args = array(
                    'post_type' => 'post',
                    'cat' => $the_monday_blog_cats ,
                    'post_status' => 'publish',
                    'posts_per_page' => $the_monday_default_posts_per_page,
                    'paged' => $the_monday_paged,
                    'order' => 'DESC'
                    );
    $blog_page_query = new WP_Query( $blog_page_args );
    if( $blog_page_query->have_posts() ) {
?>
    <div class="blog-wrapper classic-blog" itemscope itemtype="http://schema.org/LiveBlogPosting">
<?php
        while( $blog_page_query->have_posts() ) {
            $blog_page_query->the_post();
            $image_id = get_post_thumbnail_id();
            $image_path = wp_get_attachment_image_src( $image_id, 'the-monday-classic-blog-thumb', true );
            $image_alt = get_post_meta( $image_id, '_wp_attachement_image_alt', true );
?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="single-post-wrapper" itemprop="liveBlogUpdate" itemscope itemtype="http://schema.org/BlogPosting">
                <header class="entry-header">
            		<?php the_title( sprintf( '<h3 class="entry-title blog-post-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
            		
                    <div class="entry-meta">
            			<?php the_monday_posted_on(); ?>
            		</div><!-- .entry-meta -->
                    
            	</header><!-- .entry-header -->
                <?php if( has_post_thumbnail() ) { ?>
                <div class="entry-post-image" itemprop="image">
                    <figure><img src="<?php echo esc_url( $image_path[0] );?>" alt="<?php echo esc_attr( $image_alt ); ?>" title="<?php the_title(); ?>" /></figure>
                </div>
                <?php } ?>
                <div class="entry-content" itemprop="description">
                    <?php
            			/* translators: %s: Name of current post */
            			/*the_content( sprintf(
            				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the-monday' ), array( 'span' => array( 'class' => array() ) ) ),
            				the_title( '<span class="screen-reader-text">"', '"</span>', false )
            			) );*/
                        the_monday_excerpt_word();
            		?>
            
            		<?php
            			wp_link_pages( array(
            				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-monday' ),
            				'after'  => '</div>',
            			) );
            		?>
                </div><!-- .entry-content -->
                <a class="read-more-button blog-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e( 'Read More', 'the-monday' ); ?></a>
            </div>
            <footer class="entry-footer">
        		<?php the_monday_entry_footer(); ?>
        	</footer><!-- .entry-footer -->
        </article><!-- #post-## -->
<?php
        }
        $big = 999999999; // need an unlikely integer
         $pagination_args = array(
        	'base'               => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        	'format'             => '?page=%#%',
        	'total'              => $blog_page_query->max_num_pages,
        	'current'            => max( 1, get_query_var('paged') ),
        	'show_all'           => False,
        	'end_size'           => 1,
        	'mid_size'           => 2,
        	'prev_next'          => True,
        	'prev_text'          => __( 'Previous', 'the-monday' ),
        	'next_text'          => __( 'Next', 'the-monday' ),
        	'type'               => 'plain',
        	'add_args'           => False,
        	'add_fragment'       => '',
        	'before_page_number' => '',
        	'after_page_number'  => ''
            );
?>
        <div class="archive-pagination blog-pagination"><?php echo paginate_links( $pagination_args ); ?></div>
    </div>
<?php
    }
    wp_reset_query();
?>