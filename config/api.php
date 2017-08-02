<?php
/**
+--------------------------------------------------------------------
| File    : api.php
| Path    : /wp-content/plugins/stress-shifter/config/api.php
| Purpose : It contains all custom wordpress endpoints.
| Created : 28-June-2017
| Author  :  KiBiz Systems
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * User needs to register custom endpints here.
 */

return array(
	// For adding user to any group
	0 => array(
		'namespace' => 'stress-shifter/v1',
		'route' => '/buddypress/group/add_user',
		'meta' => array(
			'methods'  => WP_REST_Server::CREATABLE,
			'callback' => array(
				'class' => 'Stress_Shifter_Buddypress_Api',
				'method' => 'add_user_to_buddypress_group',
			),
			'args' => array(
				'level' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_numeric( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Level no of exercise' ),
				),
			),
		   'show_in_index' => true,
		),
	),

	// For sharing note among a group.
	1 => array(
		'namespace' => 'stress-shifter/v1',
		'route' => '/buddypress/forum/add_note',
		'meta' => array(
			'methods'  => WP_REST_Server::CREATABLE,
			'callback' => array(
				'class' => 'Stress_Shifter_Buddypress_Api',
				'method' => 'add_note_to_forum',
			),
			'args' => array(
				'note' => array(
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Note that will be shared by user as a reply to the topic.' ),
					'required' => true,
				),

				'forum_id' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_numeric( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Id of forum' ),
					'required' => true,
				),

				'topic_id' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_numeric( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Id of topic' ),
					'required' => true,
				)
			),
		   'show_in_index' => true,
		),
	),

	2 => array(
		'namespace' => 'stress-shifter/v1',
		'route' => '/buddypress/forum/get_topics',
		'meta' => array(
			'methods'  => WP_REST_Server::READABLE,
			'callback' => array(
				'class' => 'Stress_Shifter_Buddypress_Api',
				'method' => 'get_topics_by_forum_id',
			),
			'args' => array(
				'forum_id' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_numeric( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Id of forum' ),
					'required' => true,
				)
			),
		   'show_in_index' => true,
		),
	),

	// For storing stress rating data on SS web.
	3 => array(
		'namespace' => 'stress-shifter/v1',
		'route' => '/stress/save_rating',
		'meta' => array(
			'methods'  => WP_REST_Server::CREATABLE,
			'callback' => array(
				'class' => 'Stress_Shifter_Stress_Ratings_Api',
				'method' => 'save_ratings',
			),
			'args' => array(
				'stress_shift_id' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_numeric( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Stress shifter project id' ),
					'required' => true,
				),

				'stressor_name' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_string( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Stressor name' ),
					'required' => true,
				),

				'body_part' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_string( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Human body part name.' ),
					'required' => true,
				),

				'stress_rating' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_numeric( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Stress rating.' ),
					'required' => true,
				),

				'date_time_stamp' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_numeric( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Date time stamp of stress note' ),
					'required' => true,
				)

			),
		   'show_in_index' => true,
		),
	),

	// For storing stress notes data on SS web.
	4 => array(
		'namespace' => 'stress-shifter/v1',
		'route' => '/stress/save_note',
		'meta' => array(
			'methods'  => WP_REST_Server::CREATABLE,
			'callback' => array(
				'class' => 'Stress_Shifter_Stress_Notes_Api',
				'method' => 'save_note',
			),
			'args' => array(
				'note' => array(
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Note that will be shared by user.' ),
					'required' => true,
				),

				'level' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_numeric( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Level no of exercise' ),
					'required' => true,
				),

				'date_time_stamp' => array(
					'validate_callback' => function( $param, $request, $key ) {
						return is_numeric( $param );
					},
					'sanitize_callback'  => 'sanitize_text_field',
					'description' => __( 'Date time stamp of stress note' ),
					'required' => true,
				)
			),
		   'show_in_index' => true,
		),
	),

);
