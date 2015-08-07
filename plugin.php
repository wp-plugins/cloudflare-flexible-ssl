<?php
/*
 * Plugin Name: CloudFlare Flexible SSL
 * Plugin URI: http://icwp.io/2f
 * Description: Fix For CloudFlare Flexible SSL Redirect Loop For WordPress
 * Version: 1.1.0
 * Text Domain: cloudflare-flexible-ssl
 * Author: iControlWP
 * Author URI: http://icwp.io/2e
 */

class ICWP_Cloudflare_Flexible_SSL {

	public function __construct() {}

	public function run() {

		$aIcwpHttpsServerOpts = array( 'HTTP_CF_VISITOR', 'HTTP_X_FORWARDED_PROTO' );
		foreach( $aIcwpHttpsServerOpts as $sOption ) {

			if ( !empty( $_SERVER[ $sOption ] ) && ( strpos( $_SERVER[ $sOption ], 'https' ) !== false ) ) {
				$_SERVER[ 'HTTPS' ] = 'on';
				break;
			}
		}
	}
}

$oIcwpCfFlexibleSslCheck = new ICWP_Cloudflare_Flexible_SSL();
$oIcwpCfFlexibleSslCheck->run();