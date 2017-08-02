<?php
/**
+--------------------------------------------------------------------
| File    : assets.php
| Path    : /wp-content/plugins/stress-shifter/config/assets.php
| Purpose : It contains list of all js & css files that needs to be registered & enqueued.
| Created : 25-Oct-2016
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Please register your js files inside 'script' key and css files inside
 * 'styles' key.
 *
 * handler - handler name for registering css/js files
 * url - url of file
 * dependecies - any js/css dependecies on other files.
 * version - version of css/js file
 * enqueue - If you need to load css/js in all pages , make it true otherwise make it false.
 *           If its made false , its registered. but you need to enquque it inside any shortcodes.
 */
return array(
	'scripts' => array(
		0 => array(
			'handler' => 'stress_shifter_quiz_js',
			'url' => plugins_url( 'js/quiz.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery', 'jquery-ui-progressbar', 'jquery-effects-slide' ),
			'version' => '1.69',
			'enqueue' => false,
		),

		1 => array(
			'handler' => 'stress_shifter_exercise',
			'url' => plugins_url( 'js/exercise.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array(
				'jquery',
				'jquery-ui-draggable',
				'jquery-ui-droppable',
				'jquery-ui-sortable',
				'jquery-ui-dialog',
			),
			'version' => '2.4',
			'enqueue' => true,
		),

		3 => array(
			'handler' => 'stress_shifter_d3_js',
			'url' => 'https://d3js.org/d3.v4.min.js',
			'dependecies' => array( 'jquery' ),
			'version' => '1.1',
			'enqueue' => false,
		),

		4 => array(
			'handler' => 'stress_shifter_block_ui_js',
			'url' => plugins_url( 'js/jquery.blockUI.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery' ),
			'version' => '1.1',
			'enqueue' => false,
		),

		5 => array(
			'handler' => 'stress_shifter_canvg_js',
			'url' => plugins_url( 'js/canvg.js',STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery' ),
			'version' => '1.1',
			'enqueue' => false,
		),

		6 => array(
			'handler' => 'stress_shifter_datatable_js',
			'url' => '//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',
			'dependecies' => array( 'jquery' ),
			'version' => '1.1',
			'enqueue' => false,
		),

		7 => array(
			'handler' => 'stress_shifter_report_js',
			'url' => plugins_url( 'js/report.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery' ),
			'version' => '1.8',
			'enqueue' => false,
		),

		8 => array(
			'handler' => 'stress_shifter_highchart_js',
			'url' => '//code.highcharts.com/highcharts.js',
			'dependecies' => array( 'jquery' ),
			'version' => '1.1',
			'enqueue' => false,
		),

		9 => array(
			'handler' => 'stress_shifter_highchart_export_js',
			'url' => '//code.highcharts.com/modules/exporting.js',
			'dependecies' => array( 'jquery' ),
			'version' => '1.1',
			'enqueue' => false,
		),

		10 => array(
			'handler' => 'stress_shifter_dashboard_js',
			'url' => plugins_url( 'js/dashboard.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery', 'jquery-ui-datepicker' ),
			'version' => '2.4',
			'enqueue' => false,
		),

		11 => array(
			'handler' => 'stress_shifter_stress_profile_js',
			'url' => plugins_url( 'js/stress-profile-test.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery' ),
			'version' => '1.8',
			'enqueue' => false,
		),

		12 => array(
			'handler' => 'stress_shifter_exercise_slider_js',
			'url' => plugins_url( 'js/exercise-slide.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array(
				'jquery',
				'jquery-effects-slide',
				'jquery-ui-progressbar',
				'jquery-ui-draggable',
				'jquery-ui-droppable',
				'jquery-ui-sortable',
				'stress_shifter_bar_rating_js',
			),
				'version' => '3.5',
				'enqueue' => false,
			),

		13 => array(
			'handler' => 'stress_shifter_sweet_alert_js',
			'url' => plugins_url( 'js/sweetalert.min.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery' ),
			'version' => '1.1',
			'enqueue' => false,
		),

		14 => array(
			'handler' => 'stress_shifter_jrating_js',
			'url' => plugins_url( 'js/jRate.min.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery' ),
			'version' => '1.1',
			'enqueue' => false,
		),

		 15 => array(
			'handler' => 'stress_shifter_bar_rating_js',
			'url' => plugins_url( 'js/jquery.barrating.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery' ),
			'version' => '1.1',
			'enqueue' => false,
		),

        16 => array(
            'handler' => 'stress_shifter_journal_js',
			'url' => plugins_url( 'js/journal.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery' ),
			'version' => '1.1',
			'enqueue' => false,
        ),

        17 => array(
            'handler' => 'stress_shifter_stress_profile_list_js',
			'url' => plugins_url( 'js/stress-profile-list.js', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'jquery', 'jquery-effects-slide' ),
			'version' => '1.4',
			'enqueue' => false,
        ),

        18 => array(
            'handler' => 'stress_shifter_get_started_js',
            'url' => plugins_url( 'js/get-started.js', STRESS_SHIFTER_PLUGIN_FILE ),
            'dependecies' => array('jquery', 'jquery-ui-dialog'),
            'version' => '3.4',
            'enqueue' => false
       )
	),

	'styles' => array(
		 0 => array(
			'handler' => 'stress_shifter_css',
			'url' => plugins_url( 'css/stress-shifter-quiz.css', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array( 'wpProQuiz_front_style' ),
			'version' => '8.1',
			'enqueue' => true,
		 ),

		 1 => array(
			'handler' => 'stress_shifter_ui_css',
			'url' => '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
			'dependecies' => array(),
			'version' => '1.1',
			'enqueue' => true,
		 ),

		 2 => array(
			'handler' => 'stress_shifter_datatable_css',
			'url' => '//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css',
			'dependecies' => array(),
			'version' => '1.1',
			'enqueue' => true,
		 ),

		 3 => array(
			'handler' => 'stress_shifter_animate_css',
			'url' => '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css',
			'dependecies' => array(),
			'version' => '1.1',
			'enqueue' => true,
		 ),

		 4 => array(
			'handler' => 'stress_shifter_sweet_alert_css',
			'url' => plugins_url( 'css/sweetalert.css', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array(),
			'version' => '1.2',
			'enqueue' => true,
		 ),

		 5 => array(
			'handler' => 'stress_shifter_progress_bar_css',
			'url' => plugins_url( 'css/progressbar.css', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array(),
			'version' => '1.1',
			'enqueue' => false,
		 ),

		 6 => array(
			'handler' => 'stress_shifter_bar_one_to_ten_css',
			'url' => plugins_url( 'css/themes/bars-1to10.css', STRESS_SHIFTER_PLUGIN_FILE ),
			'dependecies' => array(),
			'version' => '1.1',
			'enqueue' => false,
		 ),
	),
);
