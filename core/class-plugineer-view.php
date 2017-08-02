<?php
/**
+--------------------------------------------------------------------
| File    : class.view.php
| Path    : /wp-content/plugins/stress-shifter/includes/class.view.php
| Purpose : Contains all functions for interacting with view.
| Created : 20-Oct-2016
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Used to contain functions for shpwing view page.
 */
class Stress_Shifter_View
{
	/**
	 * @var String - Used to store plugin view path.
	 */
	protected $plugin_view_path;

	/**
	 * Used to initiate the objects .
	 * Used to set plugin paths.
	 *
	 * @param void
	 * @return void
	 */
	public function __construct() {

		$this->plugin_path = plugin_dir_path( STRESS_SHIFTER_PLUGIN_FILE ) .
							'views/' ;
	}

	/**
	 * Returns the view html.
	 *
	 * @param String  $view_name - Name of view.
	 * @param Array   $data  - Array of data with key value pairs that needs to be passed to view.
	 * @param Boolean $is_string - True - if user want to get html as return
	 *                             False - If user wants to show html.
	 * @return void
	 */
	public function get_view( $view_name = '', $data = array(), $is_string = false ) {
		extract( $data );

		// Check if user wants to show html page .
		if ( ! $is_string ) {
			require_once $this->plugin_path . $view_name . '.php';
		} else {
			// Return html from file.
			ob_start();
			include $this->plugin_path . $view_name . '.php';
			$view_html = ob_get_contents();
			ob_end_clean();
			return $view_html;
		}
	}
}
