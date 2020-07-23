<?php


class RegisterWidgets
{
    private static $instance;

    function __construct()
    {
        add_action('widgets_init', array($this, 'register_sidebars'));
    }

    static function init()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    function register_sidebars()
    {
        register_sidebar(array(
            'name' => 'Footer left sidebar',
            'id' => 'footer_widget_left',
            'description' => __('A widget area located to the left in the footer.', TXTDOMAIN),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        ));

        register_sidebar(array(
            'name' => 'Footer right sidebar',
            'id' => 'footer_widget_right',
            'description' => __('A widget area located to the right in the footer.', TXTDOMAIN),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        ));
    }

}

include_once 'CopyrightWidget/CopyrightWidget.php';
include_once 'CaptionAuthorWidget/CaptionAuthorWidget.php';