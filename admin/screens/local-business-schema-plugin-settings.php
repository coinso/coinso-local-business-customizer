<?php
if( ! defined( 'ABSPATH' ) ) {
    return;
}
?>
<div class="wrap lbs-info-wrap">
    <h1>Coisno Local Business Customizer</h1>
    <h2>Settings</h2>
    <?php settings_errors();?>
    <form class="admin-lead-form-options" method="post" action="options.php">
        <?php
            settings_fields('coinso_lbc_location_setting_group');
            do_settings_sections(__FILE__);
            /** @var Theme Mod From Customizer*/
            $url                   =  get_home_url() ? get_home_url() : '';
            $type                  =  get_option('schema_type')                ? get_option('schema_type')              : 'localBusiness';
            $brand                 =  get_option('schema_brand_name')          ? get_option('schema_brand_name')        : get_option('coinso_lbc_location_brand_name');
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


            $brand_name = isset($brand) ? $brand : get_option('coinso_lbc_location_brand_name');

        ?>
        <table class="form-table">
            <tbody>
            <!-- Brand Name -->
            <tr>
                <th>
                    <label for="coinso_lbc_location_brand_name"><?php echo _x('Brand Name', 'coinso_lbc');?></label>
                </th>
                <td>
                    <input
                            type="text"
                            name="coinso_lbc_location_brand_name"
                            id="coinso_lbc_location_brand_name"
                            value="<?php echo esc_attr($brand_name) ?>"
                            class="regular-text"
                            placeholder="<?php echo esc_attr($brand_name);?>"
                    >
                </td>
            </tr>
            </tbody>
        </table>
        <hr>
        <?php submit_button(); ?>
    </form>
</div>