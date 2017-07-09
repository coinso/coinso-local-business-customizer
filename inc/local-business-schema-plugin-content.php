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

    <div itemscope itemtype="http://schema.org/<?php echo get_theme_mod('schema_type') ? get_theme_mod('schema_type') : 'localBusiness';?>" id="lbs_schema" style="list-style-type: none; margin-left: -15px;">
        <ul class="lbs-footer-list" style="list-style-type: none; padding-left: 0;" >
            <li>
                <div class="lbs-footer-logo">
                    <a itemprop="url" href="<?php echo get_home_url(); ?>" alt="<?php echo get_theme_mod('schema_brand_name') ? get_theme_mod('schema_brand_name') : get_bloginfo('name'); ?>"  title="<?php echo get_theme_mod('schema_brand_name') ? get_theme_mod('schema_brand_name') : get_bloginfo('name'); ?>">
                        <span itemprop="logo" itemtype="https://schema.org/ImageObject">
                            <img src="<?php echo get_theme_mod('schema_logo') ? get_theme_mod('schema_logo') : plugin_dir_url(__DIR__) .'/assets/img/logo.png' ;?>" alt="<?php echo get_bloginfo('name'); ?>" itemprop="image" style="width: 120px">
                        </span>
                    </a>
                </div>
            </li>

            <li>
                <div class="footer-company-info">
                    <div class="lbs-schema-cap"><span itemprop="name" style="font-size: 20px; font-weight: bold; text-transform: capitalize"><?php echo get_theme_mod('schema_brand_name') ? get_theme_mod('schema_brand_name') : get_bloginfo('name'); ?></span></div>
                    <div class="lbs-schema-cap" <span itemprop="description" style="font-size: 18px; font-weight: 500; text-transform: capitalize"><?php echo get_theme_mod('schema_brand_description') ? get_theme_mod('schema_brand_description') : get_bloginfo('description');?></span></div>
                </div>
            </li>
            <li class="lbs-inline-block">
                <div class="lbs-footer-address">
                    <div class="lbs-description" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

                        <?php
                            if( get_theme_mod('schema_show_street_address') ){?>
                                <i class="fa fa-home"> </i>
                                <span class="lbs-schema-cap" itemprop="streetAddress"><?php echo get_theme_mod('schema_street_address') ? get_theme_mod('schema_street_address') : 'Street Name' ?></span>,
                        <?php }

                            if( get_theme_mod('schema_show_city')){ ?>
                                <span class="lbs-schema-cap" itemprop="addressLocality"><?php echo get_theme_mod('schema_city') ? get_theme_mod('schema_city') : 'City Name' ?>,</span>
                        <?php }
                            if( get_theme_mod('schema_show_region') ){ ?>
                                <span class="lbs-schema-cap" itemprop="addressRegion"><?php echo get_theme_mod('schema_region') ? get_theme_mod('schema_region') : 'Region' ?>,</span>
                        <?php }
                            if( get_theme_mod('schema_show_zip') ){?>
                        <span class="lbs-schema-cap" itemprop="postalCode"><?php echo get_theme_mod('schema_zip') ? get_theme_mod('schema_zip') : 'Zip Code' ?></span>
                        <?php }?>
                    </div>
                </div>
            </li>
            <li class="lbs-inline-block">
                <div class="lbs-footer-phone"><i class="fa fa-phone"> </i>
                    <span itemprop="telephone"><?php echo get_theme_mod('schema_phone_number') ? get_theme_mod('schema_phone_number') : '(123) 456-7890' ?></span>

                </div>
            </li>
            <li class="lbs-inline-block">
                <div class="lbs-footer-hours"><i class="fa fa-clock-o">&nbsp;</i><?php echo _e('Opening Hours');?>
                        <?php $oh = explode(',', get_theme_mod('schema_opening_hours'));
                            //Enable Multiple time table
                        ?>
                    <time itemprop="openingHours" datetime="<?php echo implode(',', $oh) ;?>"><?php echo "<ul class='hours-list' style='list-style-type: none;margin-left: 20px;'><li>" . implode('</li><li>', $oh) . "</li></ul>";?></time>

                </div>
            </li>

        </ul>
        <div class="lbs-footer-social-icons">
            <ul class="lbs-list-inline" style="list-style-type: none;">
                <?php $fb_link = get_theme_mod('facebook_url_field');
                if($fb_link){?>
                    <li style="display: inline-block; float: left; margin-right: 10px">
                        <a href="<?php echo $fb_link;?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i> </a>
                    </li>
                <?php     }
                $twitter_link = get_theme_mod('twitter_url_field');
                if($twitter_link){?>
                    <li style="display: inline-block; float: left; margin-right: 10px">
                        <a href="<?php echo $twitter_link;?>" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i> </a>
                    </li>
                <?php    }
                $google_plus_link = get_theme_mod('google_plus_url_field');
                if($google_plus_link){ ?>
                    <li style="display: inline-block; float: left; margin-right: 10px">
                        <a href="<?php echo $google_plus_link;?>" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i> </a>
                    </li>
                <?php }
                $yelp_link = get_theme_mod('yelp_url_field');
                if($yelp_link){?>
                    <li style="display: inline-block; float: left; margin-right: 10px">
                        <a href="<?php echo $yelp_link;?>" target="_blank" rel="nofollow"><i class="fa fa-yelp"></i> </a>
                    </li>
                <?php    }
                ?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>



</div><!-- #footer-disclaimer -->
