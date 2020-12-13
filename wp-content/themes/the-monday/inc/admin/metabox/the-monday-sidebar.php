<?php

/**
 * Fucntions for rendering metaboxes in single post area
 * 
 * @package The Monday
 */
 
 add_action('add_meta_boxes', 'the_monday_sidebar_layout');
 
 if( ! function_exists( 'the_monday_sidebar_layout' ) ):
 function  the_monday_sidebar_layout() {
    add_meta_box(
                 'the_monday_page_sidebar_settings', // $id
                 __( 'Sidebar Layout', 'the-monday' ), // $title
                 'the_monday_page_sidebar_settings_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority

    add_meta_box(
                 'the_monday_page_sidebar_settings', // $id
                 __( 'Sidebar Layout', 'the-monday' ), // $title
                 'the_monday_page_sidebar_settings_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority
 }
 endif;
 /*
 
$args = array(
            'public' => true,
            //'exclude_from_search' => false,
            '_builtin' => true            
            );

$output = 'name';//'names'; // names or objects, note names is the default

$operator = 'and'; // 'and' or 'or'

$custom_post_types = get_post_types(); 
echo '<pre>';
	print_r($custom_post_types);
echo '</pre>';
//die();
*/
 
 $the_monday_sidebar_layout = array(
        'default-layout' => array(
                        'value'     => 'default_layout',
                        'label'     => __( 'Default Sidebar', 'the-monday' ),
                        'thumbnail' => THE_MONDAY_ADMIN_IMAGES_URL . '/default-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'value' => 'right_sidebar',
                        'label' => __( 'Right sidebar', 'the-monday' ),
                        'thumbnail' => THE_MONDAY_ADMIN_IMAGES_URL . '/right-sidebar.png'
                    ),
        'left-sidebar' => array(
                        'value'     => 'left_sidebar',
                        'label'     => __( 'Left sidebar', 'the-monday' ),
                        'thumbnail' => THE_MONDAY_ADMIN_IMAGES_URL . '/left-sidebar.png'
                    ), 
        
       
        'no-sidebar-full-width' => array(
                        'value'     => 'no_sidebar_full_width',
                        'label'     => __( 'No sidebar Full width', 'the-monday' ),
                        'thumbnail' => THE_MONDAY_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png'
                    ),
        
        'no-sidebar-content-centered' => array(
                        'value'     => 'no_sidebar_content_centered',
                        'label'     => __( 'No sidebar Content Centered', 'the-monday' ),
                        'thumbnail' => THE_MONDAY_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
                    )    

    );
/*------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Call back function for Page sidebar layout
     */
    if( ! function_exists( 'the_monday_page_sidebar_settings_callback' ) ):
    function the_monday_page_sidebar_settings_callback() {
        global $post, $the_monday_sidebar_layout ;
        wp_nonce_field( basename( __FILE__ ), 'the_monday_page_sidebar_settings_nonce' );
    ?>
        <div class="post-sidebar-wrapper">
            <h4><span class="section-title"><?php _e( 'Available Layouts', 'the-monday' );?></span></h4>
            <span class="section-desc"><em>Select available layout which replaced sidebar layout from customizer settings.</em></span>
            <div class="layout-thmub-section">
                <ul class="single-sidebar-layout" id="the-monday-img-container">
                <?php
                    $img_count = 0 ; 
                   foreach ($the_monday_sidebar_layout as $field) {
                        $img_count++;
                        $the_monday_sidebar_meta_layout = get_post_meta( $post->ID, 'the_monday_page_sidebar', true );
                        $default_class ='';
                        if( empty($the_monday_sidebar_meta_layout) && $img_count == 1 ){
                            $default_class = 'the-monday-radio-img-selected';
                        }
                        $img_class = ($field['value'] == $the_monday_sidebar_meta_layout)?'the-monday-radio-img-selected the-monday-radio-img-img':'the-monday-radio-img-img'; 
                ?>
                    <li style="display: inline;">
                        <label>
                            <img class="<?php echo esc_attr( $default_class.' '.$img_class );?>" src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['label'] );?>" title="<?php echo esc_attr( $field['label'] );?>" />
                            <input style = 'display:none' type="radio" value="<?php echo $field['value']; ?>" name="the_monday_page_sidebar" <?php checked( $field['value'], $the_monday_sidebar_meta_layout ); if(empty($the_monday_sidebar_meta_layout) && $field['value']=='default_layout'){ echo "checked='checked'";}  ?> />
                        </label>
                    </li>
                    
                <?php } ?>
                </ul>
            </div>
                <div class="clear"></div>
            </div>
    <?php
    }
    endif;
    
/*------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Function for save sidebar layout of post
     */
    add_action('save_post', 'the_monday_save_page_sidebar');
    if( ! function_exists( 'the_monday_save_page_sidebar' ) ):
    function the_monday_save_page_sidebar( $post_id ) {
        global $post, $the_monday_sidebar_layout;
        // Verify the nonce before proceeding.
        if ( !isset( $_POST[ 'the_monday_page_sidebar_settings_nonce' ] ) || !wp_verify_nonce( $_POST[ 'the_monday_page_sidebar_settings_nonce' ], basename( __FILE__ ) ) )
            return;
    
        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;
            
        if ('page' == $_POST['post_type']) {  
            if (!current_user_can( 'edit_page', $post_id ) )  
                return $post_id;  
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;  
        }
        foreach ($the_monday_sidebar_layout as $field) {  
            //Execute this saving function
            $old = get_post_meta( $post_id, 'the_monday_page_sidebar', true); 
            $new = sanitize_text_field($_POST['the_monday_page_sidebar']);
            if ($new && $new != $old) {  
                update_post_meta($post_id, 'the_monday_page_sidebar', $new);  
            } elseif ('' == $new && $old) {  
                delete_post_meta($post_id,'the_monday_page_sidebar', $old);  
            }
         } // end foreach  
    }
    endif;    