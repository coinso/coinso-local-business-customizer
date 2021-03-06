<?php

if( ! defined( 'ABSPATH' ) ) {
    return;
}
if( !function_exists( 'coinso_local_business_customize_register' ) ){

    function coinso_local_business_customize_register($wp_customize){

//
//=================Local Business Schema===============================//
//
        // Add Social Panel
        $wp_customize->add_panel( 'Local Business Information', array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Local Business Information', 'coinso_lbc' ),
            'description' => __( 'Add your local business information.', 'coinso_lbc' ),
        ) );
// Local Business Schema
        $wp_customize->add_section('Schema', array(
            'title' => __('Local Business Schema', 'coinso_lbc'),
            'description' => sprintf(__('Options for Local Business Schema', 'coinso_lbc')),
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'panel' => 'Local Business Information'
        ));
//Brand Logo settings
        $wp_customize->add_setting('schema_logo', array(
            'default' => get_template_directory_uri() . '/assets/img/logo.png',
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//Brand Logo control
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'schema_logo', array(
            'label' => __('Logo', 'coinso_lbc'),
            'section' => 'Schema',
            'settings' => 'schema_logo'
        )));

//Schema Type settings
        $wp_customize->add_setting('schema_type', array(
            'default' => _x('LocalBusiness', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//Schema Type control
        $wp_customize->add_control('schema_type', array(
            'label' => __('Schema Type', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20,
            'type'      =>  'select',
            'choices'   =>  array(
                'LocalBusiness'         =>  _x('LocalBusiness', 'coinso_lbc'),
                'Locksmith'             =>  _x('Locksmith', 'coinso_lbc'),
                'AutomotiveBusiness'    =>  _x('AutomotiveBusiness', 'coinso_lbc'),

            )
        ));
//Brand Name settings
        $wp_customize->add_setting('schema_brand_name', array(
            'default' => _x( get_bloginfo('name'), 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//Brand Name control
        $wp_customize->add_control('schema_brand_name', array(
            'label' => __('Brand Name', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
//Brand Description settings
        $wp_customize->add_setting('schema_brand_description', array(
            'default' => _x(get_bloginfo('description'), 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//Brand Description control
        $wp_customize->add_control('schema_brand_description', array(
            'label' => __('Brand Description', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
//Phone number settings
        $wp_customize->add_setting('schema_phone_number', array(
            'default' => _x('(123) 456-7890', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//Phone number control
        $wp_customize->add_control('schema_phone_number', array(
            'label' => __('Phone Number', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
//Show Street Address settings
        $wp_customize->add_setting('schema_show_street_address', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'schema_show_street_address_checkbox'
        ));

//Show Street Address checkbox
        $wp_customize->add_control('schema_show_street_address', array(
            'type' => 'checkbox',
            'label' => __('Show Street Address', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
//Show Street Address checkbox callback
        function schema_show_street_address_checkbox($checked){
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }

//Street Address settings
        $wp_customize->add_setting('schema_street_address', array(
            'default' => _x('Street Address', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//Street Address control
        $wp_customize->add_control('schema_street_address', array(
            'label' => __('Street Address', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
        /****************************************************************/
//Show City settings
        $wp_customize->add_setting('schema_show_city', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'schema_show_city_checkbox'
        ));

//Show City checkbox
        $wp_customize->add_control('schema_show_city', array(
            'type' => 'checkbox',
            'label' => __('Show City', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
//Show City checkbox callback
        function schema_show_city_checkbox($checked){
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }
//City settings
        $wp_customize->add_setting('schema_city', array(
            'default' => _x('City', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//City control
        $wp_customize->add_control('schema_city', array(
            'label' => __('City', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
        /***************************************************************/
//Show City settings
        $wp_customize->add_setting('schema_show_region', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'schema_show_region_checkbox'
        ));

//Show City checkbox
        $wp_customize->add_control('schema_show_region', array(
            'type' => 'checkbox',
            'label' => __('Show Region', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
//Show City checkbox callback
        function schema_show_region_checkbox($checked){
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }

//Region settings
        $wp_customize->add_setting('schema_region', array(
            'default' => _x('Region', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//Region control
        $wp_customize->add_control('schema_region', array(
            'label' => __('Region', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
        /***********************************************/
//Show Zip settings
        $wp_customize->add_setting('schema_show_zip', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'schema_show_zip_checkbox'
        ));

//Show Zip checkbox
        $wp_customize->add_control('schema_show_zip', array(
            'type' => 'checkbox',
            'label' => __('Show Zip Code', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
//Show Zip checkbox callback
        function schema_show_zip_checkbox($checked){
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }

//Zip settings
        $wp_customize->add_setting('schema_zip', array(
            'default' => _x('11111', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//Zip control
        $wp_customize->add_control('schema_zip', array(
            'label' => __('Zip Code', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
        /***********************************************/
//Show Notice settings
        $wp_customize->add_setting('schema_show_notice', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'schema_show_notice_checkbox'
        ));

//Show Notice checkbox
        $wp_customize->add_control('schema_show_notice', array(
            'type' => 'checkbox',
            'label' => __('Show Notice Code', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
//Show Notice checkbox callback
        function schema_show_notice_checkbox($checked){
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }

//Notice settings
        $wp_customize->add_setting('schema_notice', array(
            'default' => _x('* This address is a mailing address', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//Notice control
        $wp_customize->add_control('schema_notice', array(
            'label' => __('Notice', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
    //*******************************
//Hours settings
        $wp_customize->add_setting('schema_opening_hours', array(
            'default' => _x('Mo-Su 00:00-23:59', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

//Hours Control
        $wp_customize->add_control('schema_opening_hours', array(
            'label' => __('Opening Hours', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));

// Payment Methods Settings
        $wp_customize->add_setting('schema_payment_methods', array(
            'default' => _x('Cash, Credit card', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

// Payment Methods Control
        $wp_customize->add_control('schema_payment_methods', array(
            'label' => __('Payment Methods', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));

// Price Range Settings
        $wp_customize->add_setting('schema_price_range', array(
            'default' => _x('USD', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

// Price Range Control
        $wp_customize->add_control('schema_price_range', array(
            'label' => __('Price Range', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));
// Link to Location Settings
        $wp_customize->add_setting('hasMap', array(
            'default' => _x('', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => ''
        ));

// Link to Location Control
        $wp_customize->add_control('hasMap', array(
            'label' => __('Add Long / Lat', 'coinso_lbc'),
            'description'   =>  __('Separate with ,', 'coinso_lbc'),
            'section' => 'Schema',
            'priority' => 20
        ));

        /**
         * Social Section
         **/


        $wp_customize->add_section( 'social_links', array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Social Links', 'coinso_lbc' ),
            'description' => __( 'Add your social links for this site.', 'coinso_lbc' ),
            'panel' => 'Local Business Information',
        ) );

        // Add Facebook settings

        $wp_customize->add_setting( 'facebook_url_field', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        // Add Facebook control

        $wp_customize->add_control( 'facebook_url_field', array(
            'type' => 'url',
            'priority' => 10,
            'section' => 'social_links',
            'label' => __( 'Facebook URL Field', 'coinso_lbc' ),
            'description' => 'Enter  the facebook page link.',
        ) );

        // Add Twitter settings

        $wp_customize->add_setting( 'twitter_url_field', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        // Add Twitter control

        $wp_customize->add_control( 'twitter_url_field', array(
            'type' => 'url',
            'priority' => 10,
            'section' => 'social_links',
            'label' => __( 'Twitter URL Field', 'coinso_lbc' ),
            'description' => 'Enter  the twitter page link.',
        ) );

        // Add Google Plus settings

        $wp_customize->add_setting( 'google_plus_url_field', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        // Add Google Plus control

        $wp_customize->add_control( 'google_plus_url_field', array(
            'type' => 'url',
            'priority' => 10,
            'section' => 'social_links',
            'label' => __( 'Google Plus URL Field', 'coinso_lbc' ),
            'description' => 'Enter  the GMB link.',
        ) );

        // Add Yelp settings

        $wp_customize->add_setting( 'yelp_url_field', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        // Add Yelp control

        $wp_customize->add_control( 'yelp_url_field', array(
            'type' => 'url',
            'priority' => 10,
            'section' => 'social_links',
            'label' => __( 'Yelp URL Field', 'coinso_lbc' ),
            'description' => 'Enter  the Yelp page link.',
        ) );

        // Add Linkedin settings

        $wp_customize->add_setting( 'linkedin_url_field', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        // Add Linkedin control

        $wp_customize->add_control( 'linkedin_url_field', array(
            'type' => 'url',
            'priority' => 10,
            'section' => 'social_links',
            'label' => __( 'Linkedin URL Field', 'coinso_lbc' ),
            'description' => 'Enter  the Linkedin page link.',
        ) );

        // Add bbb settings

        $wp_customize->add_setting( 'bbb_url_field', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        // Add bbb control

        $wp_customize->add_control( 'bbb_url_field', array(
            'type' => 'url',
            'priority' => 10,
            'section' => 'social_links',
            'label' => __( 'BBB URL Field', 'coinso_towing_theme' ),
            'description' => 'Enter  the BBB page link.',
        ) );


// Local Business Reviews Section
        $wp_customize->add_section( 'business_reviews', array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Local Business Rating', 'coinso_lbc' ),
            'description' => __( 'Add your local business rating.', 'coinso_lbc' ),
            'panel' => 'Local Business Information',
        ) );
//Show Rating
        $wp_customize->add_setting('schema_show_rating', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'schema_show_rating_checkbox'
        ));


        $wp_customize->add_control('schema_show_rating', array(
            'type' => 'checkbox',
            'label' => __('Show Rating', 'coinso_lbc'),
            'section' => 'business_reviews',
            'priority' => 10
        ));
        function schema_show_rating_checkbox($checked){
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }
//Rating settings
        $wp_customize->add_setting('schema_rating_value', array(
            'default' => _x('5', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        ));

//Rating Control
        $wp_customize->add_control('schema_rating_value', array(
            'label' => __('Rating', 'coinso_lbc'),
            'section' => 'business_reviews',
            'priority' => 20,
        ));
//Total Reviews settings
        $wp_customize->add_setting('schema_total_reviews', array(
            'default' => _x('1', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        ));

//Total Reviews Control
        $wp_customize->add_control('schema_total_reviews', array(
            'label' => __('Total Reviews', 'coinso_lbc'),
            'section' => 'business_reviews',
            'priority' => 20,
        ));
//CTA settings
        $wp_customize->add_setting('schema_total_reviews_cta', array(
            'default' => _x('1', 'coinso_lbc'),
            'type' => 'theme_mod',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        ));

//CTA Control
        $wp_customize->add_control('schema_total_reviews_cta', array(
            'label' => __('CTA', 'coinso_lbc'),
            'section' => 'business_reviews',
            'priority' => 20
        ));
    }
}
