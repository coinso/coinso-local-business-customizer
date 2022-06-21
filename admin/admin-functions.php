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
    $url                   =  get_home_url() ? get_home_url() : '';
    $type                  =  get_option('schema_type')                ? get_option('schema_type')              : 'localBusiness';
    $brand                 =  get_option('schema_brand_name')          ? get_option('schema_brand_name')        : get_bloginfo('name');
    $img                   =  get_option('schema_logo')                ? get_option('schema_logo')              : plugin_dir_url(__DIR__) .'/assets/img/logo.png';
    $description           =  get_option('schema_brand_description')   ? get_option('schema_brand_description') : get_bloginfo('description');
    $street                =  get_option('schema_street_address')      ? get_option('schema_street_address')    : _x( 'Street Name', 'coinso_lbc');
    $city                  =  get_option('schema_city')                ? get_option('schema_city')              : _x('City Name', 'coinso_lbc');
    $region                =  get_option('schema_region')              ? get_option('schema_region')            : 'Region';
    $zip                   =  get_option('schema_zip')                 ? get_option('schema_zip')               : 'Zip Code';
    $notice                =  get_option('schema_notice')              ? get_option('schema_notice')            : 'Notice';
    $phone                 =  get_option('schema_phone_number')        ? get_option('schema_phone_number')      : '(123) 456-7890';
    $hours                 =  get_option('schema_opening_hours')       ? get_option('schema_opening_hours')     : '';
    $payment_methods       =  get_option('schema_payment_methods')     ? get_option('schema_payment_methods')   : '';
    $price_range           =  get_option('schema_price_range')         ? get_option('schema_price_range')       : 'USD';
    $facebook              =  get_option('facebook_url_field')         ? get_option('facebook_url_field')       : '';
    $twitter               =  get_option('twitter_url_field')          ? get_option('twitter_url_field')        : '';
    $gmb                   =  get_option('google_plus_url_field')      ? get_option('google_plus_url_field')    : '';
    $yelp                  =  get_option('yelp_url_field')             ? get_option('yelp_url_field')           : '';
    $linkedin              =  get_option('linkedin_url_field')         ? get_option(  'linkedin_url_field')     : '';
    $bbb                   =  get_option('bbb_url_field')              ? get_option(  'bbb_url_field')          : '';
    $map                   =  get_option('hasMap')                     ? get_option('hasMap')                   : '';
    $schema_show_rating    =  get_option( 'schema_show_rating');
    $rating                =  get_option('schema_rating_value');
    $total_reviews         =  get_option('schema_total_reviews');
    $cta                   =  get_option('schema_total_reviews_cta')   ? get_option('schema_total_reviews_cta') : _x('Write a Review', 'coinso_lbc');

//    add_option('coinso_lbc_locations', []);
    /** Local Business Settings */
    register_setting('coinso_lbc_location_setting_group', 'coinso_lbc_location_brand_name', ['default' => $brand]);

}