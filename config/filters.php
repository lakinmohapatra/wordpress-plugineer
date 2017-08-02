<?php
/**
+--------------------------------------------------------------------
| File    : filters.php
| Path    : /wp-content/plugins/stress-shifter/config/filters.php
| Purpose : Contains all filters that will be used custom plugin.
| Created : 19-jan-2017
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

return array(
    0 => array(
        'action' => 'login_redirect',
        'class' => 'Stress_Shifter_Login',
        'method' => 'custom_login_redirect',
        'priority' => 10,
        'accepted_args' => 3
    )
);