<?php declare(strict_types=1);

namespace SIW\Cookie_Notice;

use SIW\Core\Template;

/**
 * Class om asset van de plugin te laden van de plugin te laden
 * 
 * @copyright 2020 SIW Internationale Vrijwilligersprojecten
 * @since     1.0.0
 */
class Notice {

	/**
	 * HTML id van cookie notice
	 */
	const NOTICE_ID = 'siw-cookie-notification';

	/**
	 * HTML id van cookie knop
	 */
	const BUTTON_ID = 'siw-cookie-consent';

	/**
	 * Init
	 */
	public static function init() {
		$self = new self();
		add_action( 'wp_footer', [ $self, 'render'] );
	}

	/**
	 * Rendert de cookie notice
	 */
	public function render() {
		Template::render_template(
			'cookie-notice',
			[
				'notice_id' => self::NOTICE_ID,
				'button_id' => self::BUTTON_ID,
				'i18n'      => [
					'cookie_text' => __( 'We gebruiken cookies om ervoor te zorgen dat onze website optimaal werkt en om het gebruik van onze website te analyseren. Door gebruik te blijven maken van onze website, ga je hiermee akkoord.', 'siw-cookie-notice' ),
					'button_text' => __( 'Ik ga akkoord', 'siw-cookie-notice' ),
				],
			]
		);
	}

}