<?php declare(strict_types=1);

namespace SIW\Cookie_Notice;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * SIW Cookie Notice
 *
 * @copyright   2020 SIW Internationale Vrijwilligersprojecten
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       SIW Cookie Notice
 * Plugin URI:        https://github.com/siwvolunteers/siw-cookie-notice
 * Description:       Cookie notice
 * Version:           1.0.0
 * Author:            SIW Internationale Vrijwilligersprojecten
 * Author URI:        https://www.siw.nl
 * Text Domain:       siw-cookie-notice
 * License:           GPLv2 or later
 * Requires at least: 5.5
 * Requires PHP:      7.4
 */

require_once dirname( __FILE__ ) . '/bootstrap.php';
add_action( 'siw_register_extensions', [ __NAMESPACE__ . '\\'.'Bootstrap', 'init' ]);
