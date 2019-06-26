<?php
/*
Plugin Name: Coinso Local Business Customizer
Plugin URI: https://github.com/coinso/coinso-local-business-customizer
Description: Add local business schema from the customizer
Author: Ido @ Coinso
Author URI: http://coinso.com/project/ido-barnea
Version: 2.2.3
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: coinso_lbc
*/
if( ! defined( 'ABSPATH' ) ) {
    return;
}
//Setup
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/coinso/coinso-local-business-customizer/',
    __FILE__,
    'coinso-lbc'
);
$myUpdateChecker->setBranch('production');


//Includes
//1.1 include registration

require_once( plugin_dir_path(__FILE__) . '/inc/local-business-schema-plugin-activation.php' );
require_once( plugin_dir_path(__FILE__) . '/inc/local-business-schema-plugin-customizer.php' );
require_once( plugin_dir_path(__FILE__) . '/inc/local-business-schema-plugin-scripts.php' );
require_once( plugin_dir_path(__FILE__) . '/inc/local-business-schema-plugin-content.php' );




//1.1 register activation
/*
 * Since Version 1.0
 *
 */
register_activation_hook(__FILE__, 'coinso_lbs_activate_plugin');

/**
 * Actions and filters
 *
 */
//Register Customizer Panel and sections
add_action('customize_register', 'coinso_local_business_customize_register');

//Register the shortcode
add_action('init', 'coinso_register_schema_shortcode');

//Add link to customizer settings from main plugins page
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'coinso_add_action_links' );


//Shorcodes
/*
 * Since Version 1.0
 *
 */


//Schema Customizer
function coinso_register_schema_shortcode( ){

    add_shortcode('schema','coinso_schema_content' );
}


/**
 * Direct Link to Customizer Panel from main plugins page
 * Added 1.5
 * @param $links
 * @return array
 *
 */
function coinso_add_action_links ( $links ) {
    $query['autofocus[panel]'] = 'Local Business Information';
    $panel_link = add_query_arg( $query, admin_url( 'customize.php' ) );

    $mylinks = array(
        '<a href="'. esc_url( $panel_link ).'">Go To Settings</a>'
    );
    return array_merge( $links, $mylinks );
}

function lbs_is_decimal($val){

	return is_numeric( $val ) && floor( $val ) != $val;
}