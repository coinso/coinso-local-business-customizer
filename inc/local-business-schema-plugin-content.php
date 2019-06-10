<?php
/*
 * This is the schema content, based on https://schema.org/LocalBusiness
 *
 * Since version 1.0
 *
 */

if( ! defined( 'ABSPATH' ) ) {
    return;
}

function coinso_schema_content($args, $content = null){
    global $schema_atts;
    $schema_atts = shortcode_atts( array(
        'url'                   =>  get_home_url() ? get_home_url() : '',
        'type'                  =>  get_theme_mod('schema_type')                ? get_theme_mod('schema_type')              : 'localBusiness',
        'brand'                 =>  get_theme_mod('schema_brand_name')          ? get_theme_mod('schema_brand_name')        : get_bloginfo('name'),
        'img'                   =>  get_theme_mod('schema_logo')                ? get_theme_mod('schema_logo')              : plugin_dir_url(__DIR__) .'/assets/img/logo.png',
        'description'           =>  get_theme_mod('schema_brand_description')   ? get_theme_mod('schema_brand_description') : get_bloginfo('description'),
        'street'                =>  get_theme_mod('schema_street_address')      ? get_theme_mod('schema_street_address')    : _x( 'Street Name', 'coinso_lbc'),
        'city'                  =>  get_theme_mod('schema_city')                ? get_theme_mod('schema_city')              : _x('City Name', 'coinso_lbc'),
        'region'                =>  get_theme_mod('schema_region')              ? get_theme_mod('schema_region')            : 'Region',
        'zip'                   =>  get_theme_mod('schema_zip')                 ? get_theme_mod('schema_zip')               : 'Zip Code',
        'phone'                 =>  get_theme_mod('schema_phone_number')        ? get_theme_mod('schema_phone_number')      : '(123) 456-7890',
        'hours'                 =>  get_theme_mod('schema_opening_hours')       ? get_theme_mod('schema_opening_hours')     : '',
        'payment_methods'       =>  get_theme_mod('schema_payment_methods')     ? get_theme_mod('schema_payment_methods')   : '',
        'price_range'           =>  get_theme_mod('schema_price_range')         ? get_theme_mod('schema_price_range')       : 'USD',
        'facebook'              =>  get_theme_mod('facebook_url_field')         ? get_theme_mod('facebook_url_field')       : '',
        'twitter'               =>  get_theme_mod('twitter_url_field')          ? get_theme_mod('twitter_url_field')        : '',
        'gmb'                   =>  get_theme_mod('google_plus_url_field')      ? get_theme_mod('google_plus_url_field')    : '',
        'yelp'                  =>  get_theme_mod('yelp_url_field')             ? get_theme_mod('yelp_url_field')           : '',
        'linkedin'              =>  get_theme_mod('linkedin_url_field')         ? get_theme_mod(  'linkedin_url_field')     : '',
        'bbb'                   =>  get_theme_mod('bbb_url_field')              ? get_theme_mod(  'bbb_url_field')          : '',
        'map'                   =>  get_theme_mod('hasMap')                     ? get_theme_mod('hasMap')                   : '',
        'schema_show_rating'    =>  get_theme_mod( 'schema_show_rating'),
        'rating'                =>  get_theme_mod('schema_reting_value'),
        'total_reviews'         =>  get_theme_mod('schema_total_reviews'),
        'cta'                   =>  get_theme_mod('schema_total_reviews_cta')   ? get_theme_mod('schema_total_reviews_cta') : _x('Write a Review', 'coinso_lbc'),
    ), $args);

    $stars_count = $schema_atts['rating'];
    function is_decimal($val){

        return is_numeric( $val ) && floor( $val ) != $val;
    }
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
                                if ( $schema_atts['map']){ ?>
                                    <a href="https://www.google.com/maps/@<?php echo $schema_atts['map'];?>,10z" title="Click to see location on the map" target="_blank">
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
                            <a href="<?php echo $google_plus_link;?>" target="_blank" rel="nofollow"><i class="fab fa-google" aria-hidden="true"></i> </a>
                        </li>
                    <?php }
                    $yelp_link = esc_url( $schema_atts['yelp'] );
                    if($yelp_link){?>
                        <li class="lbs-social-item yelp">
                            <a href="<?php echo $yelp_link;?>" target="_blank" rel="nofollow"><i class="fab fa-yelp" aria-hidden="true"></i> </a>
                        </li>
                    <?php    }
                    $linkedin_link = esc_url( $schema_atts['linkedin'] );
                    if($linkedin_link){ ?>
                        <li class="lbs-social-item linkedin">
                            <a href="<?php echo $linkedin_link;?>" target="_blank" rel="nofollow"><i class="fab fa-linkedin-in" aria-hidden="true"></i> </a>
                        </li>
                    <?php    }
                    $bbb_link = esc_url( $schema_atts['bbb'] );
                    if($bbb_link){ ?>
                        <li class="lbs-social-item bbb">
                            <a href="<?php echo $bbb_link;?>" target="_blank" rel="nofollow">BBB</a>
                        </li>
                    <?php    } ?>

                </ul>
            </div>

            <div class="clear"></div>
            <?php if ( $schema_atts['schema_show_rating'] == true && $schema_atts['rating'] ){ ?>
            <div class="lbs-review">
                <div itemscope itemtype="http://schema.org/Service" class="lbs-schema">
                    <meta itemprop="serviceType" content="<?php echo $schema_atts['type'];?>" />
                    <span itemprop="provider" itemscope itemtype="http://schema.org/Organization">
                    <span itemprop="name" class="lbs-name"><?php echo $schema_atts['business_name'];?></span>
                </span>
                    <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" class="lbs-total">
                        <span itemprop="ratingValue" class="lbs-total-score"><?php echo $schema_atts['rating'];?></span> / <span itemprop="bestRating">5</span>
                        <?php if ($stars_count){ ?>
                            <ul class="lbs-stars-list">
                                <?php
                                if ( is_decimal($stars_count) ){
                                    for ($i = 1; $i <= ($stars_count); $i++){

                                        echo '<li class="lbs-star"><i class="fas fa-star" aria-hidden="true"></i></li>';

                                    }

                                    echo '<li class="lbs-star"><i class="fas fa-star-half" aria-hidden="true"></i></li>';

                                } else {
                                    for ($i = 1; $i <= $stars_count; $i++){

                                        echo '<li class="lbs-star"><i class="fas fa-star" aria-hidden="true"></i></li>';

                                    }
                                }
                                ?>
                            </ul>
                        <?php } ?>
                        <span class="lbs-total-reviews">
                        <span itemprop="reviewCount"><?php echo $schema_atts['total_reviews'];?></span> google reviews
                    </span>

                    </div>
                </div>
                <div class="review_us">
                        <a href="<?php echo $schema_atts['gmb'];?>" target="_blank" rel="nofollow" class="lbs-btn">
                        <span class="fas fa-pencil-alt"></span>&nbsp;<?php echo $schema_atts['cta'];?>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div><!-- #footer-disclaimer -->
    <script type="application/ld+json">
            {
            "@context": "http://schema.org",
            "@type"             : "<?php echo $schema_atts['type']; ?>",
            <?php if ( $schema_atts['schema_show_rating'] == true && $schema_atts['rating'] ){ ?>
            "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "<?php echo $schema_atts['rating']; ?>",
            "reviewCount": "<?php echo $schema_atts['total_reviews']; ?>"
            },
            <?php } ?>
            "image"             : "<?php echo $schema_atts['img']; ?>",
            "hasMap"            : "<?php echo 'https://www.google.com/maps/@'. $schema_atts['map']; ?>",
            "address"           : {
            "@type"             : "PostalAddress",
            "streetAddress"     : "<?php echo $schema_atts['street']; ?>",
            "addressLocality"   : "<?php $schema_atts['city'] ?>",
            "addressRegion"     : "<?php echo $schema_atts['region'] ?>",
            "postalCode"        :"<?php echo $schema_atts['zip'] ?>"
            },
            "description"       : "<?php echo $schema_atts['description']; ?>",
            "name"              : "<?php echo $schema_atts['brand']; ?>",
            "telephone"         : "<?php echo $schema_atts['phone'] ?>",
            "openingHours"      : "<?php echo $schema_atts['hours']; ?>",
            "paymentAccepted"   : "<?php echo $schema_atts['payment_methods']; ?>",
            "priceRange"        : "<?php echo $schema_atts['price_range']; ?>",
            "sameAs" : [

                "<?php echo $schema_atts['facebook']    ? get_theme_mod( 'facebook_url_field' )     : ''; ?>",

                "<?php echo $schema_atts['twitter']     ? get_theme_mod( 'twitter_url_field' )      : ''; ?>",

                "<?php echo $schema_atts['gmb']         ? get_theme_mod( 'google_plus_url_field' )  : ''; ?>",

                "<?php echo $schema_atts['yelp']        ? get_theme_mod( 'yelp_url_field' )         : ''; ?>",

                "<?php echo $schema_atts['linkedin']    ? get_theme_mod( 'linkedin_url_field' )     : ''; ?>",

                "<?php echo $schema_atts['bbb']         ? get_theme_mod( 'bbb_url_field' )          : ''; ?>"

                ]
            }

        </script>
    <?php    return ob_get_clean();


}

