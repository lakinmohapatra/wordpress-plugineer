<?php
/**
+--------------------------------------------------------------------
| File    : class-stress-shifter-model.php
| Path    : /wp-content/plugins/stress-shifter/includes/class-stress-shifter-model.php
| Purpose : Contains all functions for basic model.
| Created : 21-Oct-2016
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Used to contain functions for fetching with basic model functions.
 */
class Stress_Shifter_Model
{
	/**
	 * @var String  - Parent table Name.
	 */
	protected $table_name = '';

	/**
	 * @var String - Name of inner join table
	 */
	protected $join_table_name = '';

	/**
	 * @var String - Name of left join table.
	 */
	protected $left_join_table_name = '';

	/**
	 * @var Object  - Database name.
	 */
	protected $db;

	/**
	 * @var String - Used to save database prefix.
	 */
	protected $prefix;


	/**
	 * Used to initiate the objects .
	 * Used to add table names.
	 */
	public function __construct() {

		global $wpdb;
		$this->db = $wpdb;
		$this->prefix = $this->db->prefix;
		$this->table_name = $this->prefix . $this->table_name;
		$this->join_table_name = $this->prefix . $this->join_table_name;
		$this->left_join_table_name = $this->prefix . $this->left_join_table_name;
	}

	/**
	 * Activates stress shifter plugin
	 *
	 * @param void
	 * @return void
	 */
	public function activate_stress_shifter() {
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$charset_collate = $this->db->get_charset_collate();
		$prefix = $this->prefix;
		$installed_version = get_option( 'stress_shifter_db_version' );

		$report_table_name = $prefix . 'stress_shifter_report';
		$exercise_table_name = $prefix . 'stress_shifter_exercise';
		$exercise_answer_table_name = $prefix . 'stress_shifter_exercise_answer';
		$exercise_answer_cost_reaction_table_name = $prefix . 'stress_shifter_answer_cost_reaction';
		$exercise_stress_map_table_name = $prefix . 'stress_shifter_stress_map_exercise';
		$exercise_learning_table_name = $prefix . 'stress_shifter_exercise_learning';
		$overall_stress_rating_table_name = $prefix. 'stress_shifter_overall_stress_rating';
		$stress_note_table_name = $prefix. 'stress_shifter_stress_note';
		$stress_rating_table_name = $prefix . 'stress_shifter_stress_rating';

		$sql = "CREATE TABLE IF NOT EXISTS $report_table_name (
			id int(11) NOT NULL AUTO_INCREMENT,
			user_id bigint(20) NOT NULL,
			created_time DATETIME NOT NULL,
			anonymous_user_first_name text NOT NULL,
			anonymous_user_last_name text NOT NULL,
			anonymous_user_email text NOT NULL,
			ar DECIMAL(4,2) UNSIGNED NOT NULL,
			br DECIMAL(4,2) UNSIGNED NOT NULL,
			lg DECIMAL(4,2) UNSIGNED NOT NULL,
			ps DECIMAL(4,2) UNSIGNED NOT NULL,
			PRIMARY KEY (id),
			UNIQUE KEY id (id)
		  ) $charset_collate;";
		dbDelta( $sql );

		$sql = "CREATE TABLE IF NOT EXISTS $exercise_table_name (
				id int(11) NOT NULL AUTO_INCREMENT,
				user_id bigint(20) NOT NULL,
				type text NOT NULL,
				created_time text NOT NULL,
				PRIMARY KEY (id),
				UNIQUE KEY id (id)
			  ) $charset_collate;";

		dbDelta( $sql );

		$sql = "CREATE TABLE IF NOT EXISTS $exercise_answer_table_name (
				id int(11) NOT NULL AUTO_INCREMENT,
				exercise_id bigint(20) NOT NULL,
				question_id bigint(20) NOT NULL,
				answer text NOT NULL,
				priority bigint(20) NOT NULL,
				PRIMARY KEY (id),
				UNIQUE KEY id (id)
			  ) $charset_collate;";

		dbDelta( $sql );

		$sql = "CREATE TABLE IF NOT EXISTS $exercise_answer_cost_reaction_table_name (
				id int(11) NOT NULL AUTO_INCREMENT,
				answer_id bigint(20) NOT NULL,
				reaction text NOT NULL,
				priority bigint(20) NOT NULL,
				PRIMARY KEY (id),
				UNIQUE KEY id (id)
			  ) $charset_collate;";

		dbDelta( $sql );

		$sql = "CREATE TABLE IF NOT EXISTS $exercise_stress_map_table_name (
				id int(11) NOT NULL AUTO_INCREMENT,
				exercise_id bigint(20) NOT NULL,
				question text NOT NULL,
				answer text NOT NULL,
				priority bigint(20) NOT NULL,
				PRIMARY KEY (id),
				UNIQUE KEY id (id)
			  ) $charset_collate;";

		dbDelta( $sql );

		$sql = "CREATE TABLE IF NOT EXISTS $exercise_learning_table_name (
				id int(11) NOT NULL AUTO_INCREMENT,
				exercise_id bigint(20) NOT NULL,
				content text NOT NULL,
				PRIMARY KEY (id),
				UNIQUE KEY id (id)
			  ) $charset_collate;";

		dbDelta( $sql );

		$sql = "CREATE TABLE IF NOT EXISTS $overall_stress_rating_table_name (
				id int(11) NOT NULL AUTO_INCREMENT,
				user_id bigint(20) NOT NULL,
				stress_rating int(11) NOT NULL,
				created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (id),
				UNIQUE KEY id (id)
			  ) $charset_collate;";

		dbDelta( $sql );

		$sql = "CREATE TABLE IF NOT EXISTS $stress_note_table_name (
					id bigint(20) NOT NULL AUTO_INCREMENT,
					user_id bigint(20) NOT NULL,
					level_no int(11) NOT NULL,
					note text NOT NULL,
					created_time DATETIME NOT NULL,
					PRIMARY KEY (id),
					UNIQUE KEY id (id)
				  ) $charset_collate;";
		dbDelta( $sql );


		$sql = "CREATE TABLE IF NOT EXISTS $stress_rating_table_name (
				id bigint(20) NOT NULL AUTO_INCREMENT,
				user_id bigint(20) NOT NULL,
				stress_shift_id int(11) NOT NULL,
				stressor_name varchar(255) NOT NULL,
				body_part varchar(255) NOT NULL,
				stress_rating int(11) NOT NULL,
				created_time DATETIME NOT NULL,
				PRIMARY KEY (id),
				UNIQUE KEY id (id)
			  ) $charset_collate;";

		dbDelta( $sql );

		if ( $installed_version !== STRESS_SHIFTER_DB_VERSION ) {
			update_option( 'stress_shifter_db_version', STRESS_SHIFTER_DB_VERSION );
		}
	}

	/**
	 * Decativates stress shifter plugin.
	 *
	 * @param void
	 * @return void
	 */
	public function deactivate_stress_shifter() {
		/*$this->db->query( 'DROP TABLE IF EXISTS `' . $this->prefix . 'stress_shifter_report`' );
		$this->db->query( 'DROP TABLE IF EXISTS `' . $this->prefix . 'stress_shifter_exercise`' );
		$this->db->query( 'DROP TABLE IF EXISTS `' . $this->prefix . 'stress_shifter_exercise_answer`' );
		$this->db->query( 'DROP TABLE IF EXISTS `' . $this->prefix . 'stress_shifter_answer_cost_reaction`' );
		$this->db->query( 'DROP TABLE IF EXISTS `' . $this->prefix . 'stress_shifter_stress_map_exercise`' );
		$this->db->query( 'DROP TABLE IF EXISTS `' . $this->prefix . 'stress_shifter_exercise_learning`' );
		$this->db->query( 'DROP TABLE IF EXISTS `' . $this->prefix . 'stress_shifter_stress_note`' );
		$this->db->query( 'DROP TABLE IF EXISTS `' . $this->prefix . 'stress_shifter_stress_rating`' );*/
	}
}
