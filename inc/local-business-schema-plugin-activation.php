<?php
if( ! defined( 'ABSPATH' ) ) {
    return;
}

function coinso_lbs_activate_plugin(){
    if( version_compare( get_bloginfo('version'), '4.5', '<' ) ){
        wp_die(__('Your WordPress version is not supported, please upgrade version in order to use this plugin', 'coinso_lbs'));
    }
}