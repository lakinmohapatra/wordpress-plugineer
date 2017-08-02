<?php
/**
+--------------------------------------------------------------------
| File    : class-stress-shifter-api.php
| Path    : ./wp-content/plugins/stress-shifter/core/class-stress-shifter-api.php
| Purpose : It contains core library for dealing with any custom endpoint.
| Created : 30-June-2017
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
require_once STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'core/class-stress-shifter-plugin.php';

/**
 * It contains methods for core custom REST api for stress shifter.
 *
 * @see Stress_Shifter_Plugin
 */
class Stress_Shifter_Rest_Api extends Stress_Shifter_Plugin{
	/**
	 * It authenticates custom rest api endpoints.
	 *
	 * @param Object $request - Object of WP request class.
	 * @return Mixed (Integer/WP error)
	 */
	public function authenticate( $request ) {
		$user_name = isset( $_SERVER['PHP_AUTH_USER'] )
		             ? $_SERVER['PHP_AUTH_USER'] : '';
		$password = isset( $_SERVER['PHP_AUTH_PW'] )
		            ? $_SERVER['PHP_AUTH_PW'] : '';
		$api_key = $request->get_header( 'x-api-key' );

		if ( AUTO_LOGIN_AUTH_KEY !== $api_key ) {
			return new WP_Error(
				'cant-authenticate',
				__( 'Api key not matched', 'text-domain' ),
				array( 'status' => 401 )
			);
		}

		$user = get_user_by( 'login', $user_name );

		if ( is_wp_error( $user ) ) {
			return new WP_Error(
				'cant-authenticate',
				__( 'User does not exist', 'text-domain' ),
				array( 'status' => 401 )
			);
		}

		$user_id = $user->ID;
		$isAuthenticated = wp_check_password( $password, $user->user_pass, $user_id );

		if ( ! $isAuthenticated ) {
			return new WP_Error(
				'cant-authenticate',
				__( 'Authetication failed', 'text-domain' ),
				array( 'status' => 401 )
			);
		}

		return $user;
	}
}
