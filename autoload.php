<?php
/**
+--------------------------------------------------------------------
| File    : autoload.php
| Path    : /wp-content/plugins/stress-shifter/autoload.php
| Purpose : It contains function to autoload all php files inside a specific folder.
|           Nested directory structure is allowed.
| Created : 25-Oct-2016
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Used to autoload all php files present inside a specific folder.
 *
 * @param String $directory - Directory name
 * @return void
 */
function auto_load_php( $directory ) {
	if ( is_dir( $directory ) ) {
		$scan = scandir( $directory );
		unset( $scan[0], $scan[1] ); // unset . and ..
		foreach ( $scan as $file ) {
			if ( is_dir( $directory. '/'. $file ) ) {
				auto_load_php( $directory . '/'. $file );
			} else {
				if ( strpos( $file, '.php' ) !== false ) {
					require_once( $directory . '/'. $file );
				}
			}
		}
	}
}
