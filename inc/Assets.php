<?php


class Assets
{
    public $ver;
    private static $instance;
    private $path;

    public static function init()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function assets()
    {
        // deregister
        wp_deregister_script('jquery');
        // styles
        wp_register_style('custom-main', "{$this->path}/assets/css/style.css", array(), $this->ver, 'all');
        // scripts
        wp_register_script('jquery', "{$this->path}/assets/js/jquery-3.0.0.min.js", array(), $this->ver, true);
        wp_register_script('jq-migration', "{$this->path}/assets/js/jquery-migrate-1.4.1.min.js", array('jquery'), $this->ver, true);
        wp_register_script('custom', "{$this->path}/assets/js/custom.js", array(), $this->ver, true);

        if (is_home() || is_front_page()) {
            // enqueue styles
            wp_enqueue_style('custom-main');
            // enqueue scripts
            wp_enqueue_script('jquery');
            wp_enqueue_script('jq-migration');
            wp_enqueue_script('custom');
        }
    }

    private function __construct($version = '0.1.0')
    {
        $this->ver = $version;
        $this->path = get_template_directory_uri();

        add_action('wp_enqueue_scripts', array($this, 'assets'));
    }
}