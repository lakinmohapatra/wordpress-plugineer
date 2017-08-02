<?php
/**
+--------------------------------------------------------------------
| File    : mappings.php
| Path    : /wp-content/plugins/stress-shifter/config/mappings.php
| Purpose : It contains all table and category mappings.
| Created : 24-Oct-2016
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Please add any type of mappings here which will be used for plugin development.
 * [Available for controllers ans models.]
 */
global $wpdb;

return array(
	'type_map' => array(
		'stressor' => 'Stressor',
		'trigger' => 'Trigger',
		'fight' => 'Fight',
		'flight' => 'Flight',
		'freeze' => 'Freeze',
		'stress_map_body' => 'Physical Body Scan',
		'stress_map_emotion' => 'Emotional Body Scan',
		'stress_map_belief' => 'Belief Scan',
		'stress_test' => 'Stress Profile',
		'cost_of_stress' => 'Cost of Stress',
		'person' => 'Who',
		'activity' => 'Where',
		'time' => 'When',
		'place' => 'Where',
	),

	'exercise_table_map' => array(
		'stressor' => $wpdb->prefix . 'stress_shifter_exercise',
		'stress_reaction' => $wpdb->prefix . 'stress_shifter_exercise',
		'stress_map' => $wpdb->prefix . 'stress_shifter_exercise',
		'stress_test' => $wpdb->prefix . 'stress_shifter_report',
		'cost_of_stress' => $wpdb->prefix . 'stress_shifter_exercise',
	),

	'answer_table_map' => array(
		'stressor' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'stress_reaction' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'stress_reaction_2' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'stress_map' => $wpdb->prefix . 'stress_shifter_stress_map_exercise',
		'stress_test' => $wpdb->prefix . 'stress_shifter_report',
		'cost_of_stress' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'stress_map_body' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'question' => $wpdb->prefix . 'wp_pro_quiz_question',
	),

	'where_query_map' => array(
		'stressor' => ' AND e.type IN("stressor", "trigger") ',
		'stress_reaction_2' => ' AND e.type = "stress_reaction" ',
		'stress_reaction' => ' AND e.type IN("fight", "flight", "freeze") ',
		'stress_map' => ' AND e.type IN("stress_map_body",
						 "stress_map_emotion", "stress_map_belief") ',
		'stress_test' => '',
		'cost_of_stress' => ' AND e.type = "cost_of_stress" ',
	),

	'latest_exercise_summary_table_map' => array(
		'stressor' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'trigger' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'fight' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'flight' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'freeze' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'stress_reaction' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'cost_of_stress' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'stress_map_body' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'stress_map_emotion' => $wpdb->prefix . 'stress_shifter_stress_map_exercise',
		'stress_map_belief' => $wpdb->prefix . 'stress_shifter_stress_map_exercise',
		'journal' => $wpdb->prefix . 'stress_shifter_exercise_learning',
		'question' => $wpdb->prefix . 'wp_pro_quiz_question',
		'who' =>  $wpdb->prefix . 'stress_shifter_exercise_answer',
		'what' =>  $wpdb->prefix . 'stress_shifter_exercise_answer',
		'when' => $wpdb->prefix . 'stress_shifter_exercise_answer',
		'where' => $wpdb->prefix . 'stress_shifter_exercise_answer',
	),

	'exercise_type_sequence' => array(
		'trigger' => array( 'stressor', 'trigger' ),
		'stress_reaction' => array( 'stress_reaction' ),
		'stress_map' => array( 'stress_map_body', 'stress_map_emotion', 'stress_map_belief' ),
		'cost_of_stress' => array( 'cost_of_stress' ),
	),

	'exercise_details_sequence' => array(
		'trigger' => array(
			'label' => 'Stressors & Triggers',
			'page_id' => 2576,
		),
		'stress_reaction' => array(
			'label' => 'Stress Reaction',
			'page_id' => 2869,
		),
		'stress_map' => array(
			'label' => 'Stress Map',
			'page_id' => 2803,
		),
		'cost_of_stress' => array(
			'label' => 'Costs of stress',
			'page_id' => 2727,
		),
	),

	'exercise_series' => array(
		'trigger',
		'stress_reaction',
		'stress_map',
		'cost_of_stress',
	),

	'stress_reaction_phase_map' => array(
		'person' => 'who',
		'activity' => 'what',
		'time' => 'when',
		'place' => 'where',
	),

	'stress_reaction_2_types' => array(
		'who', 'where', 'when', 'what'
	),

    'level_group' => array(
        '1' => 4,
        '2' => 5,
        '3' => 6,
        '4' => 7
    )
);
