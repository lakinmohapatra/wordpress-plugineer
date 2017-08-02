<?php
/**
+--------------------------------------------------------------------
| File    : shortcodes.php
| Path    : /wp-content/plugins/stress-shifter/config/shortcodes.php
| Purpose : It contains shortcodes along with corresponding classes and methods.
| Created : 24-Oct-2016
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * shortcode - Name of shortcode that needs to be registered.
 * class - Name of class whose object needs tobe instantiated.
 * method - Name of method of above class which will be executed.
 *
 * Please add new shortcodes on increasing key index  order.
 */
return array(
	0 => array(
		'shortcode' => 'STRESS_PROFILE_TEST',
		'class' => 'Stress_Shifter_Stress_Profile',
		'method' => 'get_stress_profile_test_html_v2',
	),

	1 => array(
		'shortcode' => 'STRESS_SHIFTER_TEST',
		'class' => 'Stress_Shifter_Stress_Profile',
		'method' => 'get_stress_profile_test_html_v1',
	),

	2 => array(
		'shortcode' => 'LEARNING_EXERCISE_LIST',
		'class' => 'Stress_Shifter_Exercise_Learning',
		'method' => 'generate_learning_list_html',
	),

	3 => array(
		'shortcode' => 'STRESS_SHIFTER_PROGRESS_CHART',
		'class' => 'Stress_Shifter_Stress_Shift',
		'method' => 'stress_shifter_get_progress_chart',
	),

	4 => array(
		'shortcode' => 'STRESS_SHIFTER_DASHBOARD',
		'class' => 'Stress_Shifter_Dashboard_Builder',
		'method' => 'dashboard_layout_html',
	),

	5 => array(
		'shortcode' => 'STRESS_SHIFTER_EXERCISE_LIST',
		'class' => 'Stress_Shifter_Exercise_List',
		'method' => 'get_exercise_list_html',
	),

	6 => array(
		'shortcode' => 'STRESS_SHIFTER_STRESS_PROFILE_LIST',
		'class' => 'Stress_Shifter_Stress_Profile',
		'method' => 'show_stress_test_reports',
	),

	7 => array(
		'shortcode' => 'STRESS_SHIFTER_EXERCISE_LATEST',
		'class' => 'Stress_Shifter_Exercise_List',
		'method' => 'get_stress_shifter_latest_summary',
	),

	8 => array(
		'shortcode' => 'STRESS_SHIFTER_LEARNING_LATEST',
		'class' => 'Stress_Shifter_Exercise_Learning',
		'method' => 'fetch_latest_leraning',
	),

	9 => array(
		'shortcode' => 'STRESS_SHIFTER_EXERCISE',
		'class' => 'Stress_Shifter_Exercise_List',
		'method' => 'get_exercise_html',
	),

    10 => array(
        'shortcode' => 'STRESS_SHIFTER_JOURNAL_LIST',
        'class' => 'Stress_Shifter_Journal',
        'method' => 'get_journal_list'
    ),

    11 => array(
        'shortcode' => 'STRESS_SHIFTER_GET_STARTED',
        'method' => function(){
            wp_enqueue_script( 'stress_shifter_sweet_alert_js' );
            wp_enqueue_script( 'stress_shifter_get_started_js' );
        }
    )
);
