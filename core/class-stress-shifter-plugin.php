<?php
/**
+--------------------------------------------------------------------
| File    : class-stress-shifter-plugin.php
| Path    : /wp-content/plugins/stress-shifter/includes/class-stress-shifter-plugin.php
| Purpose : It contains all core plugin functionalities.
| Created : 25-Oct-2016
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * It contains all methods for core features of stress shifter plugin.
 */
class Stress_Shifter_Plugin
{
	/**
	 * @var Object - Contians the model object.
	 */
	protected $model;

	/**
	 * @var Array - Contains one array map of shortcodes & its actions/methods/classes.
	 */
	protected $shortcodes_map;

	/**
	 * @var Array  - Contains array map of assets with its handle/url/dependecies/version etc.
	 */
	protected $assets_map;

	/**
	 * @var Array  - Contains array map of actions along with its classes , methods etc.
	 */
	protected $actions_map;

	/**
	 * @var Array - Contains array map of filters along with its classes , methods etc.
	 */
	protected $filters_map;

	/**
	 * @var Array  - It contains all php varibales that needs to be passed to js.
	 */
	protected $php_to_js;

	/**
	 * @var Object - Contains the class object.
	 */
	protected static $instance = null;

	/**
	 * Used to initialize the shortcpdes, actions, filters etc.
	 *
	 * @param void
	 * @return void
	 */
	public function __construct() {
		$this->init();
		$this->load_shortcodes();
		$this->load_actions();
		$this->load_filters();
		add_action( 'rest_api_init', array($this, 'load_endpoints'));
	}

	/**
	 * Gets object of any class.
	 *
	 * @param void
	 * @return Object
	 */
	public static function get_instance() {
		$class = get_called_class();
		if ( ! isset( self::$instance[ $class ] ) ||
		   ! self::$instance[ $class ] instanceof $class ) {
			// create and instance of child class which extends Singleton super class
			self::$instance[ $class ] = new static();

			return  self::$instance[ $class ];
		}

		return static::$instance[ $class ];
	}

	/**
	 * Initializes the basic things like
	 * activation,deactivation & all mappings.
	 *
	 * @param void
	 * @return void
	 */
	protected function init() {

		register_activation_hook( STRESS_SHIFTER_PLUGIN_FILE, array( $this, 'activate' ) );
		register_deactivation_hook( STRESS_SHIFTER_PLUGIN_FILE, array( $this, 'deactivate' ) );
		$this->model = new Stress_Shifter_Model();
		$this->shortcodes_map = require STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'config/shortcodes.php';
		$this->assets_map = require STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'config/assets.php';
		$this->actions_map = require STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'config/actions.php';
		$this->filters_map = require STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'config/filters.php';

		$admin_settings_obj = new Stress_Shifter_Settings_Menu();
		$admin_settings_obj->init_settings();
	}

	/**
	 * Activates plugin.
	 *
	 * @param void
	 * @return void
	 */
	public function activate() {

		$this->model->activate_stress_shifter();
	}

	/**
	 * Deactivates the plugin.
	 *
	 * @param void
	 * @return void
	 */
	public function deactivate() {

		$this->model->deactivate_stress_shifter();
	}

	/**
	 * Loads all shortcodes.
	 *
	 * @param void
	 * @return void
	 */
	protected function load_shortcodes() {

		if ( ! empty( $this->shortcodes_map ) &&
			is_array( $this->shortcodes_map ) ) {
			foreach ( $this->shortcodes_map as $shortcode_map ) {
				if ( empty( $shortcode_map['class'] ) ||
					! isset( $shortcode_map['class'] )) {
					$shortcode_method = $shortcode_map['method'];
				} else {
					$shortcode_method = array(
						$shortcode_map['class']::get_instance(),
						$shortcode_map['method'],
					);
				}
				add_shortcode(
					$shortcode_map['shortcode'],
					$shortcode_method
				);
			}
		}
	}

	/**
	 * Shares php varibales with js.
	 *
	 * @param void
	 * @return void
	 */
	public function pass_php_to_js() {
		 $this->php_to_js = require STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'config/php-to-js.php';
		 $background_image_base64 = 'data:image/png;base64,' .
								base64_encode(file_get_contents(
									plugin_dir_path( STRESS_SHIFTER_PLUGIN_FILE ) .
									'images/chart.png'
								));

		echo '<script type="text/javascript">' .
				'var stress_shifter = ' .
				json_encode( $this->php_to_js ) . ';' .
			 '</script>';
	}

	/**
	 * Loads all assets
	 *
	 * @param void
	 * @return void
	 */
	public function load_assets() {

		if ( ! empty( $this->assets_map ) &&
			is_array( $this->assets_map ) ) {
			foreach ( $this->assets_map['scripts'] as $asset_map ) {
				wp_register_script(
					$asset_map['handler'],
					$asset_map['url'],
					$asset_map['dependecies'],
					$asset_map['version'],
					true
				);

				if ( $asset_map['enqueue'] ) {
					wp_enqueue_script( $asset_map['handler'] );
				}
			}

			foreach ( $this->assets_map['styles'] as $asset_map ) {
				wp_register_style(
					$asset_map['handler'],
					$asset_map['url'],
					$asset_map['dependecies'],
					$asset_map['version']
				);

				if ( $asset_map['enqueue'] ) {
					wp_enqueue_style( $asset_map['handler'] );
				}
			}
		}
	}

	/**
	 * Loads all wp actions.
	 *
	 * @param void
	 * @return void
	 */
	public function load_actions() {

		if ( ! empty( $this->actions_map ) &&
			is_array( $this->actions_map ) ) {
			foreach ( $this->actions_map as $action_map ) {
				if ( empty( $action_map['class'] ) ) {
					$action_method = $action_map['method'];
				} else {
					$object  = $action_map['class'] !== __CLASS__
							   ? $action_map['class']::get_instance()
							   : $this;
					$action_method = array( $object, $action_map['method'] );
				}

				add_action( $action_map['action'], $action_method );
			}
		}
	}

	/**
	 * Loads all wp filters.
	 *
	 * @param void
	 * @return void
	 */
	protected function load_filters() {
		if ( ! empty( $this->filters_map ) &&
			is_array( $this->filters_map ) ) {
			foreach ( $this->filters_map as $filter_map ) {
				if ( empty( $filter_map['class'] ) ) {
					$filter_method = $filter_map['method'];
				} else {
					$object  = $filter_map['class'] !== __CLASS__
							   ? $filter_map['class']::get_instance()
							   : $this;
					$filter_method = array( $object, $filter_map['method'] );
				}

				$filter_priority = $filter_map['priority'];
				$accepted_args = $filter_map['accepted_args'];
				$filter_action = $filter_map['action'];
				add_filter( $filter_action, $filter_method, $filter_priority, $accepted_args );
			}
		}
	}

	/**
	* Loads custom endpoints from config and registers it.
	*
	* @param void
	* @return void
	*/
	public function load_endpoints() {
		$endpoints = require STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'config/api.php';

		if ( ! empty( $endpoints )) {
			foreach($endpoints as $endpoint) {
				$namespace = isset($endpoint['namespace']) ? $endpoint['namespace'] : '';
				$route = isset($endpoint['route']) ? $endpoint['route'] : '';
				$meta = isset($endpoint['meta']) && is_array($endpoint['meta'])
				        ? $endpoint['meta'] : array();
				$callback = $meta['callback'];

				if ( empty( $callback['class'] ) ) {
					$api_callback = $callback['method'];
				} else {
					$object  = $callback['class'] !== __CLASS__
							   ? $callback['class']::get_instance()
							   : $this;
					$api_callback = array( $object, $callback['method'] );
				}

				$meta['callback'] = $api_callback;



				register_rest_route( $namespace, $route, $meta );
			}
		}
	}
}
