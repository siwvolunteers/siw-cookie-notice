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
		add_filter( 'siw_extensions', [ $self, 'register_extension' ] );
		add_action( 'siw_extensions_loaded', [ $self, 'load_classes']);
	}

	/**
	 * Registreer extensie
	 *
	 * @param array $extensions
	 *
	 * @return array
	 */
	public function register_extension( array $extensions ) : array {
		$extensions[ plugin_basename( SIW_COOKIE_NOTICE_PLUGIN_FILE ) ] = [
			'namespace'    => __NAMESPACE__,
			'plugin_path'  => plugin_dir_path( SIW_COOKIE_NOTICE_PLUGIN_FILE ),
			'src_dir'      => 'src',
			'template_dir' => 'templates'
		];
		return $extensions;
	}

	/**
	 * Laadt classes
	 */
	public function load_classes() {
		Assets::init();
		Notice::init();
	}

	/**
	 * Definieer constantes
	 * 
	 * @todo verplaatsen naar SIW\Extensions->define_constants?
	 */
	protected function define_constants() {
		$plugin_info = get_file_data( SIW_COOKIE_NOTICE_PLUGIN_FILE, [ 'version' => 'Version'] );
		define ( 'SIW_COOKIE_NOTICE_VERSION', $plugin_info['version'] );
		define ( 'SIW_COOKIE_NOTICE_ASSETS_URL', plugin_dir_url( __FILE__ ) . 'assets/' );
	}
}
