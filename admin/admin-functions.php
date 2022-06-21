<?php

function lbs_create_menu() {
    $menu_slug = 'lbs-settings';
    add_menu_page(
        __( 'Local Business Schema', 'coinso_lbc' ),
        'Local Business Schema',
        'manage_options',
        $menu_slug,
        'lbs_settings_page',
        plugins_url('/img/logo.png', __FILE__),
        77
    );

    add_submenu_page(
        $menu_slug,
        __('How to use Local Business Schema?','coinso_lbc'),
        'Info',
        'manage_options',
        $menu_slug.'-info',
        'lbs_info_page'
    );
}


function lbs_settings_page() {
    ob_start();

    include ( plugin_dir_path( __DIR__ ). '/admin/screens/local-business-schema-plugin-settings.php');

    $info = ob_get_clean();
    echo $info;

}
function lbs_info_page() {
    ob_start();

    include ( plugin_dir_path( __DIR__ ). '/admin/screens/local-business-schema-plugin-info.php');

    $info = ob_get_clean();
    echo $info;

}


function lbc_register_settings(){

//    add_option('coinso_lbc_locations', []);
    /** Local Business Settings */
    register_setting('coinso_lbc_location_setting_group', 'coinso_lbc_location_brand_name', ['default' => get_bloginfo('name')]);

}