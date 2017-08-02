<?php
/**
+--------------------------------------------------------------------
| File    : class-settings-menu.php
| Path    : /wp-content/plugins/stress-shifter/includes/controllers/class-settings-menu.php
| Purpose : Contains all features of plugin settings page.
| Created : 20-july-2017
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Conatins stress shifter setting menu
 */
class Stress_Shifter_Settings_Menu
{
	/**
	 * Initiates settings for plugin.
	 *
	 * @param void
	 * @return void
	 */
	public function init_settings() {
		if ( is_admin() ) {
			add_action( 'admin_menu', array( $this, 'load_menus' ) );
			add_action( 'admin_init', array( $this, 'register_stress_shifter_settings' ) );
		}
	}

	/**
	 * Loads menus from admin menus inside config.
	 *
	 * @param void
	 * @return void
	 */
	public function load_menus() {
		// Fetch all menus.
		$menus = require STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'config/admin-menus.php';

		// Loop through all menus.
		foreach ( $menus as $menu ) {
			// Create callback.
			if ( empty( $menu['class'] ) ) {
					$menu_callback = $menu['method'];
			} else {
				$object  = $menu['class'] !== __CLASS__
						   ? $menu['class']::get_instance()
						   : $this;
				$menu_callback = array( $object, $menu['method'] );
			}

			// Adds top level menu
			if ( isset( $menu['page_title'] ) &&
				! empty( $menu['page_title'] ) &&
				isset( $menu['menu_title'] ) &&
				! empty( $menu['menu_title'] ) &&
				isset( $menu['capability'] ) &&
				! empty( $menu['capability'] ) &&
				isset( $menu['menu_slug'] ) &&
				! empty( $menu['menu_slug'] ) ) {
				// Add a new top-level menu (ill-advised):
				add_menu_page(
					$menu['page_title'],
					$menu['menu_title'],
					$menu['capability'],
					$menu['menu_slug'],
					$menu_callback
				);
			}

			// Adds submenu
			if ( isset( $menu['submenus'] ) &&
				! empty( $menu['submenus'] ) ) {
				foreach ( $menu['submenus'] as $submenu ) {
					if ( empty( $submenu['class'] ) ) {
						$submenu_callback = $submenu['method'];
					} else {
						$object  = $submenu['class'] !== __CLASS__
								   ? $submenu['class']::get_instance()
								   : $this;
						$submenu_callback = array( $object, $submenu['method'] );
					}

					if ( isset( $submenu['page_title'] ) &&
						! empty( $submenu['page_title'] ) &&
						isset( $submenu['menu_title'] ) &&
						! empty( $submenu['menu_title'] ) &&
						isset( $submenu['capability'] ) &&
						! empty( $submenu['capability'] ) &&
						isset( $submenu['menu_slug'] ) &&
						! empty( $submenu['menu_slug'] ) ) {
							// Add a submenu to the custom top-level menu:
							add_submenu_page(
								$menu['menu_slug'],
								$submenu['page_title'],
								$submenu['menu_title'],
								$submenu['capability'],
								$submenu['menu_slug'],
								$submenu_callback
							);
					}
				}
			}
		}
	}

	/**
	 * Registers stress shifter options.
	 *
	 * @param void
	 * @return void
	 */
	public function register_stress_shifter_settings() {
		$option_groups = require STRESS_SHIFTER_PLUGIN_DIRECTORY_PATH . 'config/admin-options.php';

		foreach ( $option_groups as $group => $options ) {
			foreach ( $options as $option ) {
				register_setting( $group, $option );
			}
		}
	}
}
