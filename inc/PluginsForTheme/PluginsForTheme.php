<?php


class PluginsForTheme {
	private static $instance;

	public function __construct() {
		require_once dirname( __DIR__ ) . '/class-tgm-plugin-activation.php';
		add_action( 'tgmpa_register', array( $this, 'itDecision_require_plugins' ) );
	}

	public static function init() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function itDecision_require_plugins() {
		$plugins = array(

			array(
				'name'               => 'Number Info',
				'slug'               => 'number-info',
				'source'             => get_stylesheet_directory() . '/plugins/number-info.zip',
				'required'           => true,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => true,
			),
		);

		$config = array();

		tgmpa( $plugins, $config );
	}
}