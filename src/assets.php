<?php declare(strict_types=1);

namespace SIW\Cookie_Notice;

/**
 * Class om assets van de plugin te laden
 * 
 * @copyright 2020 SIW Internationale Vrijwilligersprojecten
 * @since     1.0.0
 */
class Assets {

	/**
	 * Versie van JS Cookie
	 */
	const JSCOOKIE_VERSION = '2.2.1';

	/**
	 * Init
	 */
	public static function init() {
		$self = new self();
		add_action( 'wp_enqueue_scripts', [ $self, 'enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $self, 'enqueue_styles'] );
	}

	/**
	 * Voegt scripts toe
	 */
	public function enqueue_scripts() {
		wp_register_script( 'js-cookie', SIW_COOKIE_NOTICE_ASSETS_URL . 'vendor/js-cookie/js.cookie.js', [], self::JSCOOKIE_VERSION, true );
		wp_register_script( 'siw-cookie-notice', SIW_COOKIE_NOTICE_ASSETS_URL . 'js/siw-cookie-notice.js', [ 'js-cookie' ], SIW_COOKIE_NOTICE_VERSION, true );
		wp_localize_script(
			'siw-cookie-notice',
			'siw_cookie_notice',
			[
				'cookie' => [
					'name'    => 'siw_cookie_consent',
					'expires' => 365,
					'value'   => 1,
				],
				'notice_id'   => Notice::NOTICE_ID,
				'button_id'   => Notice::BUTTON_ID,
			]
		);
		wp_enqueue_script( 'siw-cookie-notice' );
	}

	/**
	 * Voegt styles toe
	 */
	public function enqueue_styles() {
		wp_register_style( 'siw-cookie-notice', SIW_COOKIE_NOTICE_ASSETS_URL . 'css/siw-cookie-notice.css', [], SIW_COOKIE_NOTICE_VERSION );
		wp_enqueue_style( 'siw-cookie-notice' );
	}
}
