<?php
/**
	Plugin Name: Stress Shifter Custom Plugin
	Plugin URI: http://www.kibizsystems.com/
	Description: Helps in page design using wp-pro-quiz and generated reporting charts.
	Version: 1.0
	Author: Mindfire Solutions.
	Author URI: http://www.mindfiresolutions.com/
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
date_default_timezone_set('UTC');

define( 'EMAIL_DOMAIN', 'stressshifter.com' );
define( 'STRESS_SHIFTER_PLUGIN_FILE', __FILE__ );
define( 'STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH', plugin_dir_path( __FILE__ ) );

require_once STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'config/defines.php';
require_once STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'autoload.php';

if ( function_exists( 'auto_load_php' ) ) {
	auto_load_php( STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'core' );
	auto_load_php( STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'includes' );
} else {
	wp_die( 'auto_load_php function does not exist. Please include it.' );
}

if ( class_exists( 'Stress_Shifter_Plugin' ) ) {
	$stress_shifter_plugin = new Stress_Shifter_Plugin();
} else {
	wp_die( 'Stress_Shifter_Plugin does not exist.' );
}
