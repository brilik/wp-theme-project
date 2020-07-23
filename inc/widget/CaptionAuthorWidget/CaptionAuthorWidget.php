<?php


class CaptionAuthorWidget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'footer_widget_right',
            __('Caption author', TXTDOMAIN),
            array(
                'description' => __('Display author', TXTDOMAIN)
            )
        );
    }

    public function widget( $args, $instance ) {
        $caption_author = $instance['caption'];
        echo $args['before_widget'];

        echo "<a href=\"https://www.it-decision.com/\" target=\"_blank\">{$caption_author}</a>";

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $caption = $link = '';

        if ( isset( $instance[ 'caption' ] ) ) {
            $caption = $instance[ 'caption' ];
        }
        if ( isset( $instance[ 'link' ] ) ) {
            $link = $instance[ 'link' ];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'caption' ); ?>"><?php _e('Caption', TXTDOMAIN); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'caption' ); ?>" name="<?php echo $this->get_field_name( 'caption' ); ?>" type="text" value="<?php echo esc_attr( $caption ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e('Link:', TXTDOMAIN); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?= ($link) ? esc_attr( $link ) : '' ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['caption'] = ( ! empty( $new_instance['caption'] ) ) ? strip_tags( $new_instance['caption'] ) : '';
        $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('CaptionAuthorWidget');
});