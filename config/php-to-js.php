<?php
/**
+--------------------------------------------------------------------
| File    : php-to-js.php
| Path    : /wp-content/plugins/stress-shifter/config/php-to-js.php
| Purpose : It contains all php variables that needs to be passed to js.
| Created : 25-Oct-2016
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
* Add logics for parameters here.
*/
$header = isset( $_GET['header'] ) && ! $_GET['header'] ? 0 : 1;
$footer = isset( $_GET['footer'] ) && ! $_GET['footer'] ? 0 : 1;


/**
 * Please add all php varibales that you want to make it available for js .
 * Note : These varibales will be available globally for all pages. (frontend + admin)
 */
return array(
	'ajax_url' => admin_url( 'admin-ajax.php' ),
	'user_id' => get_current_user_id(),
	'random_identifier' => time(),
	'chart_url' => plugins_url( 'images/chart.png', STRESS_SHIFTER_PLUGIN_FILE ),
	'page_url' => get_permalink(),
	'ajax_nonce' => wp_create_nonce( 'stress_shifter' ),
	'post_id' => get_the_ID(),
	'cookie_path' => COOKIEPATH,
	'cookie_domain' => COOKIE_DOMAIN,
	'default_from_date' => date( 'Y-m-d', strtotime( 'last Sunday' ) ),
	'default_to_date' => date( 'Y-m-d', strtotime( 'next Saturday' ) ),
    'header' => $header,
    'footer' => $footer,
    'ss_win_runtime_url' => get_option( 'ss_win_runtime_url' ),
    'ss_mac_runtime_url' => get_option( 'ss_mac_runtime_url' ),
    'ss_fm_file_url' => get_option( 'ss_fm_file_url' ),
    'ss_webdirect_url' => get_option( 'ss_webdirect_url' ),
    'ajax_loader_url' => plugins_url( 'images/ajax-loader.gif', STRESS_SHIFTER_PLUGIN_FILE )
);
