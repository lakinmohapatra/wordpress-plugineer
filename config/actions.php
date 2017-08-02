<?php
/**
+--------------------------------------------------------------------
| File    : actions.php
| Path    : /wp-content/plugins/stress-shifter/config/actions.php
| Purpose : It contains all actions , its methods and classes.
| Created : 2-Jan-2017
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * User needs to add action name , class and corresponding method in one array.
 */
return array(
	array(
		'action' => 'wp_enqueue_scripts',
		'class' => 'Stress_Shifter_Plugin',
		'method' => 'load_assets',
	),

	array(
		'action' => 'wp_head',
		'class' => 'Stress_Shifter_Plugin',
		'method' => 'pass_php_to_js',
	),

	array(
	   'action' => 'wp_ajax_get_stress_profile_all_questions',
	   'class' => 'Stress_Shifter_Stress_Profile',
	   'method' => 'get_stress_profile_all_questions',
	),

	array(
		'action' => 'wp_ajax_nopriv_get_stress_profile_all_questions',
		'class' => 'Stress_Shifter_Stress_Profile',
		'method' => 'get_stress_profile_all_questions',
	),

    array(
		'action' => 'wp_ajax_stress_shifter_submit_learning',
		'class' => 'Stress_Shifter_Exercise_Learning',
		'method' => 'stress_shifter_submit_learning',
	),

	array(
		'action' => 'wp_ajax_nopriv_stress_shifter_submit_learning',
		'class' => 'Stress_Shifter_Exercise_Learning',
		'method' => 'stress_shifter_submit_learning',
	),

	array(
		'action' => 'wp_ajax_get_stress_test_chart_data',
		'class' => 'Stress_Shifter_Stress_Profile',
		'method' => 'get_stress_test_chart_data',
	),

	array(
		'action' => 'wp_ajax_nopriv_get_stress_test_chart_data',
		'class' => 'Stress_Shifter_Stress_Profile',
		'method' => 'get_stress_test_chart_data',
	),

	array(
		'action' => 'wp_ajax_stress_shifter_submit_exercise',
		'class' => 'Stress_Shifter_Exercise_List',
		'method' => 'submit_exercise',
	),

	array(
		'action' => 'wp_ajax_nopriv_stress_shifter_submit_exercise',
		'class' => 'Stress_Shifter_Exercise_List',
		'method' => 'submit_exercise',
	),

	array(
		'action' => 'wp_ajax_stress_shifter_submit_cost_of_reaction',
		'class' => 'Stress_Shifter_Exercise_List',
		'method' => 'stress_shifter_submit_cost_of_reaction',
	),

	array(
		'action' => 'wp_ajax_nopriv_stress_shifter_submit_cost_of_reaction',
		'class' => 'Stress_Shifter_Exercise_List',
		'method' => 'stress_shifter_submit_cost_of_reaction',
	),

	array(
		'action' => 'admin_enqueue_scripts',
		'class' => 'Stress_Shifter_Stress_Popup',
		'method' => 'load_admin_assets',
	),

	array(
		'action' => 'init',
		'class' => 'Stress_Shifter_Stress_Popup',
		'method' => 'set_popup_cookie',
	),

	array(
		'action' => 'admin_head',
		'class' => 'Stress_Shifter_Plugin',
		'method' => 'pass_php_to_js',
	),

	array(
		'action' => 'wp_ajax_stress_shifter_submit_stress_rating',
		'class' => 'Stress_Shifter_Stress_Popup',
		'method' => 'submit_stress_rating',
	),

	array(
		'action' => 'wp_ajax_stress_shifter_get_stress_ratings',
		'class' => 'Stress_Shifter_Stress_Shift',
		'method' => 'get_stress_ratings',
	),

	array(
		'action' => 'wp_ajax_nopriv_stress_shifter_get_stress_ratings',
		'class' => 'Stress_Shifter_Stress_Shift',
		'method' => 'get_stress_ratings',
	),

	array(
		'action' => 'wp_logout',
		'class' => 'Stress_Shifter_Stress_Popup',
		'method' => 'unset_popup_cookie',
	),

	array(
		'action' => 'wp_ajax_stress_shifter_get_next_exercise',
		'class' => 'Stress_Shifter_Stress_Popup',
		'method' => 'get_next_exercise',
	),

    array(
		'action' => 'after_setup_theme',
		'class' => 'Stress_Shifter_Login',
		'method' => 'auto_login',
	),

    array(
        'action' => 'wp_ajax_stress_shifter_get_question',
        'class' => 'Stress_Shifter_Stress_Profile',
        'method' => 'get_stress_profile_question'
    ),

    array(
        'action' => 'wp_ajax_nopriv_stress_shifter_get_question',
        'class' => 'Stress_Shifter_Stress_Profile',
        'method' => 'get_stress_profile_question'
    ),

    array(
        'action' => 'wp_ajax_stress_shifter_get_journals',
        'class' => 'Stress_Shifter_Journal',
        'method' => 'get_journal_list_ajax'
    ),

    array(
        'action' => 'wp_ajax_nopriv_stress_shifter_get_journals',
        'class' => 'Stress_Shifter_Journal',
        'method' => 'get_journal_list_ajax'
    ),

    array(
        'action' => 'wp_ajax_stress_shifter_get_stress_test_reports',
        'class' => 'Stress_Shifter_Stress_Profile',
        'method' => 'get_stress_test_reports_ajax'
    ),

    array(
        'action' => 'wp_ajax_nopriv_stress_shifter_get_stress_test_reports',
        'class' => 'Stress_Shifter_Stress_Profile',
        'method' => 'get_stress_test_reports_ajax'
    ),

    /*array(
        'action' => 'admin_menu',
        'class' => 'Stress_Shifter_Settings_Menu',
        'method' => 'init_settings'
    ),*/

    array(
        'action' => 'wp_ajax_stress_shifter_log_downloads',
        'class' => 'Stress_Shifter_Download_Tracker',
        'method' => 'log_download_count_ajax'
    ),

    array(
        'action' => 'wp_ajax_nopriv_stress_shifter_log_downloads',
        'class' => 'Stress_Shifter_Download_Tracker',
        'method' => 'log_download_count_ajax'
    ),

    array(
        'action' => 'wp_ajax_stress_shifter_get_stress_shifts',
        'class' => 'Stress_Shifter_Stress_Shift',
        'method' => 'get_stress_shifts_ajax'
    ),

   array(
        'action' => 'wp_ajax_nopriv_stress_shifter_get_stress_shifts',
        'class' => 'Stress_Shifter_Stress_Shift',
        'method' => 'get_stress_shifts_ajax'
    )
);
