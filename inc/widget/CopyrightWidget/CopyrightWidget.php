<?php


class CopyrightWidget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'footer_widget_left',
            __('Copyright', TXTDOMAIN),
            array(
                'description' => __('Display copyright', TXTDOMAIN)
            )
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $copyright_year = $instance['copyright_year'];

        echo $args['before_widget'];

        echo "&copy {$copyright_year} ";

        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        if ( isset( $instance[ 'copyright_year' ] ) ) {
            $copyright_year = $instance[ 'copyright_year' ];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Copy text', TXTDOMAIN); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'copyright_year' ); ?>"><?php _e('Year:', TXTDOMAIN); ?></label>
            <input id="<?php echo $this->get_field_id( 'copyright_year' ); ?>" name="<?php echo $this->get_field_name( 'copyright_year' ); ?>" type="text" value="<?php echo ($copyright_year) ? esc_attr( $copyright_year ) : date('Y'); ?>" size="3" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['copyright_year'] = ( is_numeric( $new_instance['copyright_year'] ) ) ? $new_instance['copyright_year'] : date('Y');
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('CopyrightWidget');
});