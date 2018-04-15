<?php
/*
Plugin Name: Coinso Local Business Customizer
Plugin URI: https://github.com/coinso/coinso-local-business-customizer
Description: Add local business schema from the customizer
Author: Ido @ Coinso
Author URI: http://coinso.com/project/ido-barnea
Version: 2.1.1
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

//activate json/ld script if schema is showing on the page
add_action('wp_head','coinso_footer_schema_ld_json');

//Shorcodes
/*
 * Since Version 1.0
 *
 */


//Schema Customizer
function coinso_register_schema_shortcode( ){

    add_shortcode('schema','coinso_schema_content' );
}

function coinso_schema_content($args, $content = null){
    global $schema_atts;
    $schema_atts = shortcode_atts( array(
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
        'map'                   =>  get_theme_mod('hasMap'),
    ), $args);
    ob_start(); ?>


<div id="lbs-footer-schema">

    <div itemscope itemtype="http://schema.org/<?php echo esc_html_e( $schema_atts['type'] );?>" id="lbs_schema">
        <ul class="lbs-footer-list">
            <li>
                <div class="lbs-footer-logo">
                    <a itemprop="url" href="<?php echo $schema_atts['url']; ?>" alt="<?php echo esc_html_e( $schema_atts['brand'] ) ; ?>"  title="<?php echo get_theme_mod('schema_brand_name') ? get_theme_mod('schema_brand_name') : get_bloginfo('name'); ?>">
                        <span itemprop="logo" itemtype="https://schema.org/ImageObject">
                            <img src="<?php echo  $schema_atts['img'] ;?>" alt="<?php echo esc_html_e( $schema_atts['brand'] ); ?>" itemprop="image" class="lbs_logo">
                        </span>
                    </a>
                </div>
            </li>

            <li>
                <div class="footer-company-info">
                    <div class="lbs-schema-cap">
                        <span itemprop="name" class="lbs-brand__name">
                            <?php echo esc_html_e( $schema_atts['brand'] ); ?>
</span>
</div>
<div class="lbs-schema-cap">
    <span itemprop="description" class="lbs-brand__desc">
        <?php echo esc_html_e( $schema_atts['description'] );?>
    </span>
</div>
</div>
</li>
<li class="lbs-inline-block">
    <div class="lbs-footer-address">
        <div class="lbs-description" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

            <?php
            if( get_theme_mod('schema_show_street_address') ){
                if ( get_theme_mod('hasMap')){ ?>
                    <a href="https://www.google.com/maps/@<?php echo get_theme_mod( 'hasMap' );?>" title="Click to see location on the map" target="_blank">
                        <i class="fas fa-map-marker-alt" aria-hidden="true"> </i>
                    </a>
                <?php } else { ?>
                    <i class="fas fa-map-marker-alt" aria-hidden="true"> </i>
                 <?php }   ?>
                <span class="lbs-schema-cap" itemprop="streetAddress"><?php echo esc_html_e($schema_atts['street']); ?></span>
            <?php }

            if( get_theme_mod('schema_show_city')){ ?>
                <span class="lbs-schema-cap" itemprop="addressLocality"><?php echo  esc_html_e($schema_atts['city']);?></span>
            <?php }
            if( get_theme_mod('schema_show_region') ){ ?>
                <span class="lbs-schema-cap" itemprop="addressRegion"><?php echo  esc_html_e($schema_atts['region']) ?></span>
            <?php }
            if( get_theme_mod('schema_show_zip') ){ ?>
                <span class="lbs-schema-cap" itemprop="postalCode"><?php echo esc_html_e($schema_atts['zip']) ?></span>
            <?php }

            if ( get_theme_mod('schema_show_street_address') ){ ?>
                <span class="lbs-schema cap" id="appointment">* Office Services are by Appointment Only</span>
            <?php } ?>

        </div>
    </div>
</li>
<li class="lbs-inline-block">
    <div class="lbs-footer-phone"><i class="fas fa-phone" aria-hidden="true"> </i>
        <span itemprop="telephone"><?php echo  esc_html_e($schema_atts['phone']) ?></span>

    </div>
</li>
<li class="lbs-inline-block">
    <div class="lbs-footer-hours"><i class="far fa-clock" aria-hidden="true">&nbsp;</i><?php echo _e('Opening Hours: ');?>
        <?php $oh = explode(',', $schema_atts['hours']);
        //Enable Multiple time table
        ?>
        <time itemprop="openingHours" datetime="<?php echo implode(',', $oh) ;?>"><?php echo "<ul class='hours-list'><li>" . implode('</li><li>', $oh) . "</li></ul>";?></time>


    </div>
</li>
<li class="lbs-inline-block">
    <div class="lbs-footer-payment"><i class="far fa-credit-card" aria-hidden="true">&nbsp;</i><?php echo _e('Payment Methods: ');?>
        <?php $pm = explode(',', $schema_atts['payment_methods']);
        //Enable Multiple time table
        ?>
        <div itemprop="paymentAccepted"><?php echo "<span class='payment-item'>" . implode('</span>, <span>', $pm) . "</span>";?></div>
    </div>
</li>
<li class="lbs-inline-block">
    <div class="lbs-footer-price"><i class="fas fa-dollar-sign" aria-hidden="true">&nbsp;</i><?php echo _e('Accepted Currency: ');?>
        <span itemprop="priceRange" class='price-item'><?php echo  esc_html_e( $schema_atts['price_range'] ); ?></span>
    </div>
</li>

</ul>
<div class="lbs-footer-social-icons">
    <ul class="lbs-list-inline">
        <?php $fb_link = esc_url( $schema_atts['facebook'] );
        if($fb_link){?>
            <li class="lbs-social-item facebook">
                <a href="<?php echo $fb_link;?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-f" aria-hidden="true"></i> </a>
            </li>
        <?php     }
        $twitter_link = esc_url( $schema_atts['twitter'] );
        if($twitter_link){?>
            <li class="lbs-social-item twitter">
                <a href="<?php echo $twitter_link;?>" target="_blank" rel="nofollow"><i class="fab fa-twitter" aria-hidden="true"></i> </a>
            </li>
        <?php    }
        $google_plus_link = esc_url( $schema_atts['gmb'] );
        if($google_plus_link){ ?>
            <li class="lbs-social-item google-plus">
                <a href="<?php echo $google_plus_link;?>" target="_blank" rel="nofollow"><i class="fab fa-google-plus" aria-hidden="true"></i> </a>
            </li>
        <?php }
        $yelp_link = esc_url( $schema_atts['yelp'] );
        if($yelp_link){?>
            <li class="lbs-social-item yelp">
                <a href="<?php echo $yelp_link;?>" target="_blank" rel="nofollow"><i class="fab fa-yelp" aria-hidden="true"></i> </a>
            </li>
        <?php    }
        ?>
    </ul>
</div>
<div class="clear"></div>
</div>



</div><!-- #footer-disclaimer -->

  <?php  return ob_get_clean();


}

/**
 * Check if the schema short code used in a page
 */
function custom_shortcode_scripts() {
    global $post;
    if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'schema') ) {

                add_action('wp_footer', 'coinso_footer_schema_ld_json');

    }
}
function coinso_footer_schema_ld_json(){
    global $post;
    if( is_front_page() && has_shortcode( $post->post_content, 'schema') ) :
    ob_start(); ?>
    <script type="application/ld+json">
            {
            "@context": "http://schema.org",
            "@type": "<?php echo get_theme_mod( 'schema_type' ) ? get_theme_mod( 'schema_type' ) : 'LocalBusiness'; ?>",
            "image": "<?php echo get_theme_mod( 'schema_logo' ) ? get_theme_mod( 'schema_logo' ) : get_stylesheet_directory_uri() . '/assets/img/logo.png'; ?>",
            "hasMap": "<?php echo 'https://www.google.com/maps/@'. get_theme_mod( 'hasMap' ) ? 'https://www.google.com/maps/@'. get_theme_mod( 'hasMap' ) : ''; ?>",
            "address": {
            "@type": "PostalAddress",
            "streetAddress": "<?php echo get_theme_mod( 'schema_street_address' ) ? get_theme_mod( 'schema_street_address' ) : 'Street Name' ?>",
            "addressLocality": "<?php echo get_theme_mod( 'schema_city' ) ? get_theme_mod( 'schema_city' ) : 'City Name' ?>",
            "addressRegion": "<?php echo get_theme_mod( 'schema_region' ) ? get_theme_mod( 'schema_region' ) : 'Region' ?>",
            "postalCode":"<?php echo get_theme_mod( 'schema_zip' ) ? get_theme_mod( 'schema_zip' ) : 'Zip Code' ?>"
            },
            "description": "<?php echo get_theme_mod( 'schema_brand_description' ) ? get_theme_mod( 'schema_brand_description' ) : get_bloginfo( 'description' ); ?>",
            "name": "<?php echo get_bloginfo( 'name' ); ?>",
            "telephone": "<?php echo get_theme_mod('schema_phone_number') ? get_theme_mod('schema_phone_number') : '(123) 456-7890' ?>",
            "openingHours": "<?php echo get_theme_mod( 'schema_opening_hours' ) ? get_theme_mod( 'schema_opening_hours' ) : 'Mo-Su 00:00-23:59'; ?>",
            "paymentAccepted":"<?php echo get_theme_mod( 'schema_payment_methods' ) ? get_theme_mod( 'schema_payment_methods' ) : 'Cash, Credit Card'; ?>",
            "priceRange": "<?php echo get_theme_mod( 'schema_price_range' ) ? get_theme_mod( 'schema_price_range' ) : 'USD'; ?>",
            "sameAs" : [
            <?php if ( get_theme_mod( 'facebook_url_field' ) ){ ?>
                "<?php echo get_theme_mod( 'facebook_url_field' ) ? get_theme_mod( 'facebook_url_field' ) : ''; ?>"
            <?php }
        if ( get_theme_mod( 'twitter_url_field' ) ){?>
                ,"<?php echo get_theme_mod( 'twitter_url_field' ) ? get_theme_mod( 'twitter_url_field' ) : ''; ?>"
            <?php }
        if ( get_theme_mod( 'google_plus_url_field' ) ){ ?>
                ,"<?php echo get_theme_mod( 'google_plus_url_field' ) ? get_theme_mod( 'google_plus_url_field' ) : ''; ?>"
            <?php }
        if ( get_theme_mod( 'yelp_url_field' ) ){ ?>
                ,"<?php echo get_theme_mod( 'yelp_url_field' ) ? get_theme_mod( 'yelp_url_field' ) : ''; ?>"
            <?php } ?>
            ]
            }

        </script>

    <?php

    echo ob_get_clean();
    endif;
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
