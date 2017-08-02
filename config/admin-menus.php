<?php
/**
+--------------------------------------------------------------------
| File    : admin-menus.php
| Path    : ./wp-content/plugins/stress-shifter/config/admin-menus.php
| Purpose : Contains all admin menus & asscoiated submenus.
| Created : 28-july-2017
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
* Add menus & submenus inside the following array.
*/

return array(
    array(
        'page_title' => __('Stress Shifter','menu-stress-shifter'),
        'menu_title' => __('Stress Shifter','menu-stress-shifter'),
        'capability' => 'manage_options',
        'menu_slug' => 'stres-shifter-main',
        'class' => 'Stress_Shifter_Global_Settings',
        'method' => 'display',
        'submenus' => array(
            array(
                'page_title' => __('Stress Profile','menu-stress-shifter-profile'),
                'menu_title' => __('Stress Profile Chart','menu-stress-shifter-profile'),
                'capability' => 'manage_options',
                'menu_slug' => 'ss-stress-profile',
                'class' => 'Stress_Shifter_Stress_Profile_Settings',
                'method' => 'display'
            )
        )
    )
);