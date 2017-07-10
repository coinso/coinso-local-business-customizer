<?php
/*
Plugin Name: Coinso Local Business Customizer
Plugin URI: https://github.com/coinso/coinso-local-business-customizer
Description: Add local business schema from the customizer
Author: Ido @ Coinso
Author URI: http://coinso.com
Version: 1.0
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: coinso_lbc
*/
if( ! defined( 'ABSPATH' ) ) {
    return;
}
//Setup



//Includes
//1.1 include registration

require_once( plugin_dir_path(__FILE__) . '/inc/local-business-schema-plugin-activation.php' );
require_once( plugin_dir_path(__FILE__) . '/inc/local-business-schema-plugin-customizer.php' );
require_once( plugin_dir_path(__FILE__) . '/inc/local-business-schema-plugin-scripts.php' );
require_once( plugin_dir_path(__FILE__) . '/inc/local-business-schema-plugin-ld-json.php' );



//Hooks
//1.1 register activation
/*
 * Since Verion 1.0
 *
 */
register_activation_hook(__FILE__, 'coinso_lbs_activate_plugin');
add_action('customize_register', 'coinso_local_business_customize_register');
add_action('init', 'coinso_register_schema_shortcode');



//Shorcodes
/*
 * Since Version 1.0
 *
 */

//Schema Customizer
function coinso_register_schema_shortcode(){
    add_shortcode('schema','coinso_schema' );
}
function coinso_schema($args, $content){

    ob_start();
    include ('inc/local-business-schema-plugin-content.php');

    return ob_get_clean();
}

// Create the Menu link

//function coinso_options_menu_link(){
//    add_submenu_page(
//        'options-general.php',
//        __('Local Business Schema'),
//        __('Local Business Schema'),
//        'manage_options',
//        admin_url( '/customize.php?autofocus[panel]=Local Business Information' )
//    );
//
//}
//add_action('admin_menu','coinso_options_menu_link');
