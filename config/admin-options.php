<?php
/**
+--------------------------------------------------------------------
| File    : admin-options.php
| Path    : ./wp-content/plugins/stress-shifter/config/admin-options.php
| Purpose : Contains all options that needs to be registered.
| Created : 28-july-2017
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
* Add all options along with corresponding group that needs to be registered.
*/
return array(
    'stress-shifter-settings-group' => array(
        'ss_win_runtime_url',
        'ss_mac_runtime_url',
        'ss_fm_file_url',
        'ss_webdirect_url'
    ),

    'ss-profile-tooltips-settings-group' => array(
        // Need
        'ss_tooltip_chart1_top',
        'ss_tooltip_chart1_bottom',
        'ss_tooltip_chart1_left',
        'ss_tooltip_chart1_right',

        // Stress response
        'ss_tooltip_chart2_top',
        'ss_tooltip_chart2_bottom',
        'ss_tooltip_chart2_left',
        'ss_tooltip_chart2_right',

        //Survival strategy
        'ss_tooltip_chart3_top',
        'ss_tooltip_chart3_bottom',
        'ss_tooltip_chart3_left',
        'ss_tooltip_chart3_right',

        // Survival role.
        'ss_tooltip_chart4_top',
        'ss_tooltip_chart4_bottom',
        'ss_tooltip_chart4_left',
        'ss_tooltip_chart4_right',

        // Stress free
        'ss_tooltip_chart5_top',
        'ss_tooltip_chart5_bottom',
        'ss_tooltip_chart5_left',
        'ss_tooltip_chart5_right',

        // Creative strategy
        'ss_tooltip_chart6_top',
        'ss_tooltip_chart6_bottom',
        'ss_tooltip_chart6_left',
        'ss_tooltip_chart6_right',

        // Role shift
        'ss_tooltip_chart7_top',
        'ss_tooltip_chart7_bottom',
        'ss_tooltip_chart7_left',
        'ss_tooltip_chart7_right',
    )

);