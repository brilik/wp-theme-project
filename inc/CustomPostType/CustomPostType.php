<?php


class CustomPostType
{
    private static $instance;

    public function __construct($options)
    {
        add_action( 'init', array($this, 'create_post_type') );
    }

    public static function init($options = '')
    {
        if( is_null(self::$instance) ) {
            self::$instance = new self($options);
        }

        return self::$instance;
    }

    public function create_post_type()
    {
        $supports = array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'revisions',
        );
        $labels = array(
            'name' => _x('Projects', TXTDOMAIN),
            'singular_name' => _x('Project', 'singular'),
            'menu_name' => _x('Projects', 'admin menu'),
            'name_admin_bar' => _x('Projects', 'admin bar'),
            'add_new' => _x('Add project', 'add new'),
            'add_new_item' => __('Add new project', TXTDOMAIN),
            'new_item' => __('New project', TXTDOMAIN),
            'edit_item' => __('Edit project', TXTDOMAIN),
            'view_item' => __('View project', TXTDOMAIN),
            'all_items' => __('All projects', TXTDOMAIN),
            'search_items' => __('Search project', TXTDOMAIN),
            'not_found' => __('No news found.', TXTDOMAIN),
        );
        $args = array(
            'supports' => $supports,
            'labels' => $labels,
            'public' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'projects'),
            'has_archive' => true,
            'hierarchical' => false,
        );

        register_post_type( 'projects', $args);
    }
}