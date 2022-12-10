<?php
/**
 * Plugin Name: XML Sitemap Generator for Google
 * Plugin URI: https://wordpress.org/plugins/xml-sitemap-generator-for-google/
 * Description: Plugin to improve SEO with creating special XML Sitemap which helps search engines (Google, Yahoo, Yandex, etc.) to better index your website.
 * Author: WPGrim
 * Author URI: https://wpgrim.net/
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: xml-sitemap-generator-for-google
 * Version: 1.2.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GRIM_SG_VERSION', '1.2.1' );
define( 'GRIM_SG_FILE', __FILE__ );
define( 'GRIM_SG_PATH', dirname( GRIM_SG_FILE ) );
define( 'GRIM_SG_INCLUDES', GRIM_SG_PATH . '/includes/' );
define( 'GRIM_SG_URL', plugin_dir_url( GRIM_SG_FILE ) );
define( 'GRIM_SG_BASENAME', plugin_basename( GRIM_SG_FILE ) );

require_once GRIM_SG_INCLUDES . 'autoload.php';

register_activation_hook( GRIM_SG_FILE, 'grim_sg_activation' );
register_deactivation_hook( GRIM_SG_FILE, 'grim_sg_deactivation' );
