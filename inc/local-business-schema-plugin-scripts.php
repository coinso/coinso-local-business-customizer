<?php




if( !defined('ABSPATH')){
    return;
}
if ( !defined('PLUGIN_FOLDER')){
    define('PLUGIN_FOLDER', plugin_dir_url(__DIR__));
}
function coinso_local_business_schema_scripts() {
    wp_enqueue_style( 'local-business-schema-css', PLUGIN_FOLDER . '/assets/css/style.css');
    wp_enqueue_style( 'local-business-schema-css', PLUGIN_FOLDER  . '/assets/css/style.css');
    wp_enqueue_style( 'local-business-schema-fonts', PLUGIN_FOLDER  . '/assets/fonts/fontawesome-5.0.2/web-fonts-with-css/css/fontawesome-all.min.css', array(), '5.2', 'all' );
    wp_enqueue_script( 'local-business-schema-js', PLUGIN_FOLDER  . '/assets/js/main.js', array('jquery'), '', false );
}
add_action('wp_enqueue_scripts','coinso_local_business_schema_scripts' );