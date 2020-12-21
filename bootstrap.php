<?php declare(strict_types=1);

namespace SIW\Cookie_Notice;

/**
 * Class om alle functionaliteit van de plugin te laden
 * 
 * @copyright 2020 SIW Internationale Vrijwilligersprojecten
 * @since     1.0.0
 */
class Bootstrap {
	
	/**
	 * Init
	 */
	public static function init() {
		$self = new self();
		$self->define_constants();

		add_filter( 'siw_autoloaders', [ $self, 'add_autoloader' ] );
		add_filter( 'siw_translations', [ $self, 'add_translation'] );
		add_filter( 'siw_mustache_template_dirs', [ $self, 'add_template_dir'] );

		add_action( 'plugins_loaded', [ __NAMESPACE__ . '\Assets', 'init'] );
		add_action( 'plugins_loaded', [ __NAMESPACE__ . '\Notice', 'init'] );
	}

	/**
	 * Definieer constantes
	 */
	protected function define_constants() {
		$plugin_info = get_plugin_data( WP_PLUGIN_DIR . '/siw-google-analytics/siw-google-analytics.php' );

		define ( 'SIW_COOKIE_NOTICE_VERSION', $plugin_info['Version'] );
		define ( 'SIW_COOKIE_NOTICE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		define ( 'SIW_COOKIE_NOTICE_SRC_DIR', SIW_COOKIE_NOTICE_PLUGIN_DIR . 'src' );
		define ( 'SIW_COOKIE_NOTICE_ASSETS_URL', plugin_dir_url( __FILE__ ) . 'assets/' );
	}

	/**
	 * Voegt autoloader toe
	 *
	 * @param array $autoloaders
	 *
	 * @return array
	 */
	public function add_autoloader( array $autoloaders ) : array {
		$autoloaders[ __NAMESPACE__ ] = SIW_COOKIE_NOTICE_SRC_DIR;
		return $autoloaders;
	}

	/**
	 * Voegt vertaling toe
	 *
	 * @param array $translations
	 *
	 * @return array
	 */
	public function add_translation( array $translations ) : array {
		$translations['siw-cookie-notice'] = 'siw-cookie-notice/languages/';
		return $translations;
	}

	/**
	 * Voegt template dir toe
	 *
	 * @param array $template_dirs
	 *
	 * @return array
	 */
	public function add_template_dir( array $template_dirs ) : array {
		$template_dirs[] = SIW_COOKIE_NOTICE_PLUGIN_DIR . 'templates';
		return $template_dirs;
	}

}
