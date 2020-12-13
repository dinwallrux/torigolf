<?php
/**
 * The template for search form.
 *
 * @package The Monday
 */
?>
 <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get">
    <label>
        <span class="screen-reader-text"><?php _e( 'Search for:', 'the-monday' ) ?></span>
        <input type="search" title="<?php esc_attr_e( 'Search for:', 'the-monday' ); ?>" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search...', 'the-monday' ); ?>" class="search-field" />
    </label>
    <button type="submit" value="<?php esc_attr_e( 'Search', 'the-monday'); ?>" class="search-submit"><i class="fa fa-search"></i></button>
 </form>