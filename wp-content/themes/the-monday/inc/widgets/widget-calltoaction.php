<?php
/**
 * Call to Action widget used in various section at homepage.
 * 
 * Adds The Monday Call to Action widget.
 *
 * @package The Monday
 */
add_action('widgets_init', 'register_call_to_action_widget');

function register_call_to_action_widget() {
    register_widget('the_monday_call_to_action');
}

class The_Monday_Call_to_Action extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'the_monday_call_to_action', 'The Monday : Call to Action', array(
            'description' => __('A widget that shows Call to Action.', 'the-monday')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'cta_title' => array(
                'the_monday_widgets_name' => 'cta_title',
                'the_monday_widgets_title' => __('Call to Action Title', 'the-monday'),
                'the_monday_widgets_field_type' => 'text',
            ),
            'cta_upload' => array(
                'the_monday_widgets_name' => 'cta_upload',
                'the_monday_widgets_title' => __('Section background Image', 'the-monday'),
                'the_monday_widgets_field_type' => 'upload',
            ),
            'cta_button_url' => array(
                'the_monday_widgets_name' => 'cta_button_url',
                'the_monday_widgets_title' => __('Button Url', 'the-monday'),
                'the_monday_widgets_field_type' => 'url',
            ),
            'cta_button_text' => array(
                'the_monday_widgets_name' => 'cta_button_text',
                'the_monday_widgets_title' => __('Button Text', 'the-monday'),
                'the_monday_widgets_field_type' => 'text',
            ),
        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        $cta_bg_image = $instance['cta_upload'];
        //$value = explode('wp-content', $value);
        //$cta_upload = content_url() . $value[1];
        //var_dump($cta_upload);
        $cta_title = $instance['cta_title'];
        $cta_button_url = $instance['cta_button_url'];
        $cta_button_text = $instance['cta_button_text'];

        echo $before_widget;
        ?>
        <div class="tm-cta-wrapper wow fadeInUp"> 
            <?php
            if ( !empty( $cta_bg_image ) ) {
                $attachment_id = the_monday_get_attachment_id_from_url( $cta_bg_image );
                if ( !empty( $attachment_id ) ) {
                    $image = wp_get_attachment_image_src( $attachment_id, 'thumbnail', true );
                    $image_link = $image[0];
                    $image_full = wp_get_attachment_image_src( $attachment_id, 'full' );
                    $image_full_link = $image_full[0];                    
                } else {
                    $image_link = $cta_bg_image;
                    $$image_full_link = $cta_bg_image;                    
                }
                $wrapper_class = 'cta-style-1';
            } else {
                $wrapper_class = 'cta-style-2';
            }
            ?> 
            <div class="cta-bg <?php echo esc_attr( $wrapper_class ); ?>">
                <div class="cta-bg-overlay">
                    <div class="container clear">
                        <div class="tm-cta-position clear">
                            <?php if ( !empty( $cta_title ) ) { ?>
                                <div class="div-cta-title">
                                    <div class="table-outer">
                                        <div class="table-inner">
                                            <h2 class="cta-title"><?php echo esc_attr( $cta_title ); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php
                            if ( !empty ( $cta_button_text ) ) {
                                if ( !empty ( $cta_button_url ) ) {
                                    $button_url = $cta_button_url;
                                } else {
                                    $button_url = '#';
                                }
                                ?>
                                <div class="div-cta-button">
                                    <div class="table-outer">
                                        <div class="table-inner">
                                            <a href="<?php echo esc_url( $button_url ); ?>" class="cta-button read-more-button"><?php echo esc_attr( $cta_button_text ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if ( !empty( $attachment_id ) ) {
            ?>
            <style>
                .cta-style-1 {
                    background-image: url('<?php echo esc_url( $image_full_link ); ?>');
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                }
            </style>
            <?php
        }
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	the_monday_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$the_monday_widgets_name] = the_monday_widgets_updated_field_value( $widget_field, $new_instance[$the_monday_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	the_monday_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $the_monday_widgets_field_value = !empty( $instance[$the_monday_widgets_name]) ? esc_attr($instance[$the_monday_widgets_name] ) : '';
            the_monday_widgets_show_widget_field( $this, $widget_field, $the_monday_widgets_field_value );
        }
    }

}
