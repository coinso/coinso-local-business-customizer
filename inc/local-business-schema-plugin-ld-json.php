<?php
/**
 * Created by PhpStorm.
 * User: ido
 * Date: 3/21/2017
 * Time: 10:10 AM
 */

if( ! defined( 'ABSPATH' ) ) {
    return;
}

function coinso_footer_schema_ld_json($args){
    $schema_args = shortcode_atts( array(
        'url'                   =>  get_home_url() ? get_home_url() : '',
        'type'                  =>  get_theme_mod('schema_type') ? get_theme_mod('schema_type') : 'localBusiness',
        'brand'                 =>  get_theme_mod('schema_brand_name') ? get_theme_mod('schema_brand_name') : get_bloginfo('name'),
        'img'                   =>  get_theme_mod('schema_logo') ? get_theme_mod('schema_logo') : plugin_dir_url(__DIR__) .'/assets/img/logo.png',
        'description'           =>  get_theme_mod('schema_brand_description') ? get_theme_mod('schema_brand_description') : get_bloginfo('description'),
        'street'                =>  get_theme_mod('schema_street_address') ? get_theme_mod('schema_street_address') : 'Street Name',
        'city'                  =>  get_theme_mod('schema_city') ? get_theme_mod('schema_city') : 'City Name',
        'region'                =>  get_theme_mod('schema_region') ? get_theme_mod('schema_region') : 'Region',
        'zip'                   =>  get_theme_mod('schema_zip') ? get_theme_mod('schema_zip') : 'Zip Code',
        'phone'                 =>  get_theme_mod('schema_phone_number') ? get_theme_mod('schema_phone_number') : '(123) 456-7890',
        'hours'                 =>  get_theme_mod('schema_opening_hours') ? get_theme_mod('schema_opening_hours') : '',
        'payment_methods'       =>  get_theme_mod('schema_payment_methods') ? get_theme_mod('schema_payment_methods') : '',
        'price_range'           =>  get_theme_mod('schema_price_range') ? get_theme_mod('schema_price_range') : 'USD',
        'facebook'              =>  get_theme_mod('facebook_url_field'),
        'twitter'               =>  get_theme_mod('twitter_url_field'),
        'gmb'                   =>  get_theme_mod('google_plus_url_field'),
        'yelp'                  =>  get_theme_mod('yelp_url_field'),
        'linkedin'              =>  get_theme_mod('linkedin_url_field'),
        'bbb'                   =>  get_theme_mod('bbb_url_field'),
        'map'                   =>  get_theme_mod('hasMap'),
        'rating'                =>  get_theme_mod('schema_reting_value'),
        'total_reviews'         =>  get_theme_mod('schema_total_reviews'),
    ),$args);

    ob_start(); ?>
    <script type="application/ld+json">
            {
            "@context": "http://schema.org",
            "@type"             : "<?php echo $schema_args['type']; ?>",
            "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "<?php echo $schema_args['rating']; ?>",
            "reviewCount": "<?php echo $schema_args['total_reviews']; ?>"
            },
            "image"             : "<?php echo $schema_args['img']; ?>",
            "hasMap"            : "<?php echo 'https://www.google.com/maps/@'. $schema_args['map']; ?>",
            "address"           : {
            "@type"             : "PostalAddress",
            "streetAddress"     : "<?php echo $schema_args['street']; ?>",
            "addressLocality"   : "<?php $schema_args['city'] ?>",
            "addressRegion"     : "<?php echo $schema_args['region'] ?>",
            "postalCode"        :"<?php echo $schema_args['zip'] ?>"
            },
            "description"       : "<?php echo $schema_args['description']; ?>",
            "name"              : "<?php echo $schema_args['brand']; ?>",
            "telephone"         : "<?php echo $schema_args['phone'] ?>",
            "openingHours"      : "<?php echo $schema_args['hours']; ?>",
            "paymentAccepted"   : "<?php echo $schema_args['payment_methods']; ?>",
            "priceRange"        : "<?php echo $schema_args['price_range']; ?>",
            "sameAs" : [

                "<?php echo $schema_args['facebook']    ? get_theme_mod( 'facebook_url_field' )     : ''; ?>",

                "<?php echo $schema_args['twitter']     ? get_theme_mod( 'twitter_url_field' )      : ''; ?>",

                "<?php echo $schema_args['gmb']         ? get_theme_mod( 'google_plus_url_field' )  : ''; ?>",

                "<?php echo $schema_args['yelp']        ? get_theme_mod( 'yelp_url_field' )         : ''; ?>",

                "<?php echo $schema_args['linkedin']    ? get_theme_mod( 'linkedin_url_field' )     : ''; ?>",

                "<?php echo $schema_args['bbb']         ? get_theme_mod( 'bbb_url_field' )          : ''; ?>"

                ]
            }

        </script>

    <?php

    echo ob_get_clean();

}