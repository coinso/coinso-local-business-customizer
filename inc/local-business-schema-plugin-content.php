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
?>
<div id="lbs-footer-schema">

    <div itemscope itemtype="http://schema.org/<?php echo get_theme_mod('schema_type') ? get_theme_mod('schema_type') : 'localBusiness';?>" id="lbs_schema">
        <ul class="lbs-footer-list">
            <li>
                <div class="lbs-footer-logo">
                    <a itemprop="url" href="<?php echo get_home_url(); ?>" alt="<?php echo get_theme_mod('schema_brand_name') ? get_theme_mod('schema_brand_name') : get_bloginfo('name'); ?>"  title="<?php echo get_theme_mod('schema_brand_name') ? get_theme_mod('schema_brand_name') : get_bloginfo('name'); ?>">
                        <span itemprop="logo" itemtype="https://schema.org/ImageObject">
                            <img src="<?php echo get_theme_mod('schema_logo') ? get_theme_mod('schema_logo') : plugin_dir_url(__DIR__) .'/assets/img/logo.png' ;?>" alt="<?php echo get_bloginfo('name'); ?>" itemprop="image" class="lbs_logo">
                        </span>
                    </a>
                </div>
            </li>

            <li>
                <div class="footer-company-info">
                    <div class="lbs-schema-cap">
                        <span itemprop="name" class="lbs-brand__name">
                            <?php echo get_theme_mod('schema_brand_name') ? get_theme_mod('schema_brand_name') : get_bloginfo('name'); ?>
                        </span>
                    </div>
                    <div class="lbs-schema-cap">
                        <span itemprop="description" class="lbs-brand__desc">
                            <?php echo get_theme_mod('schema_brand_description') ? get_theme_mod('schema_brand_description') : get_bloginfo('description');?>
                        </span>
                    </div>
                </div>
            </li>
            <li class="lbs-inline-block">
                <div class="lbs-footer-address">
                    <div class="lbs-description" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

                        <?php
                            if( get_theme_mod('schema_show_street_address') ){?>
                                <i class="fas fa-home" aria-hidden="true"> </i>
                                <span class="lbs-schema-cap" itemprop="streetAddress"><?php echo get_theme_mod('schema_street_address') ? get_theme_mod('schema_street_address') : 'Street Name' ?></span>
                        <?php }

                            if( get_theme_mod('schema_show_city')){ ?>
                                <span class="lbs-schema-cap" itemprop="addressLocality"><?php echo get_theme_mod('schema_city') ? get_theme_mod('schema_city') : 'City Name' ?></span>
                        <?php }
                            if( get_theme_mod('schema_show_region') ){ ?>
                                <span class="lbs-schema-cap" itemprop="addressRegion"><?php echo get_theme_mod('schema_region') ? get_theme_mod('schema_region') : 'Region' ?></span>
                        <?php }
                            if( get_theme_mod('schema_show_zip') ){?>
                        <span class="lbs-schema-cap" itemprop="postalCode"><?php echo get_theme_mod('schema_zip') ? get_theme_mod('schema_zip') : 'Zip Code' ?></span>
                        <?php }?>
                    </div>
                </div>
            </li>
            <li class="lbs-inline-block">
                <div class="lbs-footer-phone"><i class="fas fa-phone" aria-hidden="true"> </i>
                    <span itemprop="telephone"><?php echo get_theme_mod('schema_phone_number') ? get_theme_mod('schema_phone_number') : '(123) 456-7890' ?></span>

                </div>
            </li>
            <li class="lbs-inline-block">
                <div class="lbs-footer-hours"><i class="far fa-clock" aria-hidden="true">&nbsp;</i><?php echo _e('Opening Hours');?>
                        <?php $oh = explode(',', get_theme_mod('schema_opening_hours'));
                            //Enable Multiple time table
                        ?>
                    <time itemprop="openingHours" datetime="<?php echo implode(',', $oh) ;?>"><?php echo "<ul class='hours-list'><li>" . implode('</li><li>', $oh) . "</li></ul>";?></time>

                </div>
            </li>

        </ul>
        <div class="lbs-footer-social-icons">
            <ul class="lbs-list-inline">
                <?php $fb_link = get_theme_mod('facebook_url_field');
                if($fb_link){?>
                    <li class="lbs-social-item facebook">
                        <a href="<?php echo $fb_link;?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-f" aria-hidden="true"></i> </a>
                    </li>
                <?php     }
                $twitter_link = get_theme_mod('twitter_url_field');
                if($twitter_link){?>
                    <li class="lbs-social-item twitter">
                        <a href="<?php echo $twitter_link;?>" target="_blank" rel="nofollow"><i class="fab fa-twitter" aria-hidden="true"></i> </a>
                    </li>
                <?php    }
                $google_plus_link = get_theme_mod('google_plus_url_field');
                if($google_plus_link){ ?>
                    <li class="lbs-social-item google-plus">
                        <a href="<?php echo $google_plus_link;?>" target="_blank" rel="nofollow"><i class="fab fa-google-plus" aria-hidden="true"></i> </a>
                    </li>
                <?php }
                $yelp_link = get_theme_mod('yelp_url_field');
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
