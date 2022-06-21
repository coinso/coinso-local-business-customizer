<?php
if( ! defined( 'ABSPATH' ) ) {
    return;
}
?>
<div class="wrap lbs-info-wrap">
        <h1>Coisno Local Business Customizer</h1>
        <h2>Intro</h2>
            <div class="description">
                <p>
Add schema.org structured data to your city pages with an easy to use shortcode
                    In order to use this plugin Download from
<a href="https://github.com/coinso/coinso-local-business-customizer" target="_blank" rel="nofollow">
                        <strong>git repository</strong>
                    </a>
                </p>
                <p>
Install<br>
go to WP customizer - Local Business Information Panel<br>
                </p>
                <p>
                    <strong>Add Required Information:</strong> <br>
Social Profiles<br>
                    Business information<br>
                    At your home page, add the required <code>[schema]</code> shortcode.<br>
Publish / Update page, test schema at the <a href="https://search.google.com/structured-data/testing-tool/u/0/" target="_blank" rel="nofollow">Google Structured Data Testing Tool</a>
                </p>
                <h2> Home page schema</h2>
                <p>
At the homepage you will get 2 types of structured data - html and ld+json.<br>
On inner pages you'll get only html<br>
                    in Order to use the plugin for more than one location see Available Parameters bellow <br>
                </p>
            </div>
        <hr>
        <h2>Available Shortcode Parameters</h2>
        <div class="description">
            <h3>Brand name and description</h3>
                <ul>
                    <li>brand</li>
                    <li>description</li>
                </ul>
            <h3>Address</h3>
                <ul>
                    <li>street</li>
                    <li>city</li>
                    <li>region</li>
                    <li>street</li>
                    <li>zip</li>
                </ul>
            <h3> Contact Info</h3>
            <ul>
                <li>phone</li>
                <li>hours</li>
                <li>map</li>
            </ul>
            <h3> Social</h3>
            <ul>
                <li>facebook</li>
                <li>twitter</li>
                <li>gmb</li>
                <li>yelp</li>
                <li>linkedin</li>
                <li>BBB</li>
            </ul>
            <h3> Reviews (since V 2.2)</h3>
            <ul>
                <li>rating</li>
                <li>total_reviews</li>
                <li>cta</li>
            </ul>
        </div>
        <hr>
        <h2>
            How to use the shortcode attributes (atts)?
        </h2>
        <div class="description">
            add the shortcode to the required city page and add the parameters inside the shortcode:<br/>
            <code>[schema brand="New Brand Name" street="new street"]</code>
            Save and review schema on <a href="https://search.google.com/structured-data/testing-tool/u/0/" target="_blank" rel="nofollow">Google Structured Data Testing Tool</a>
        </div>

        <h2>
            Change Log
        </h2>
            <table class="form-table lbs-cl-table">
                <tbody>
                    <tr>
                        <th>Version</th>
                        <th colspan="6">Changes</th>
                    </tr>
                    <tr>
                        <th scope="row">V 2.3</th>
                        <td colspan="6">Added Plugin Information Page</td>
                    </tr>
                    <tr>
                        <th scope="row">V 2.2.4 - Bug Fix</th>
                        <td colspan="6">Fixed - local-business-schema-plugin-content.php, line 182 - was an error due to wrong $schema_atts key</td>
                    </tr>
                    <tr>
                        <th scope="row">V 2.2.3</th>
                        <td colspan="6">prefixed "is_decimal" function and moved it to the main plugin page</td>
                    </tr>
                    <tr>
                        <th scope="row">V 2.2.2</th>
                        <td colspan="6">Removed 'Office Services are by Appointment Only' note</td>
                    </tr>
                    <tr>
                    <tr>
                        <th scope="row">V 2.2.1</th>
                        <td>Fixed error made by empty review fields</td>
                        <td colspan="5">Added conditions to show review fields</td>
                    </tr>
                    <tr>
                        <th scope="row">V 2.2 - Added google rating</th>
                        <td>Now you can add you google listing rating + a link to your GMB listing.</td>
                        <td>New atts inside the shortcode:
                            <ul>
                                <li>rating - insert listing's avg. rating</li>
                                <li>total_reviews - insert listing's total review count</li>
                                <li>cta - change the 'Write a Review' button text</li>
                            </ul>
                        </td>
                        <td>Added Rating / Reviews section in the customizer</td>
                        <td>Added Social Networks (BBB, linkedin ) & changed google plus to GMB listing</td>
                        <td>Added [Plugin Update Checker](https://github.com/YahnisElsts/plugin-update-checker#github-integration) By [Yahnis Elsts](https://github.com/YahnisElsts)</td>
                    </tr>
                    <tr>
                        <th>V 2.1</th>
                        <td>ld/json script to load on home page, only if the schema shortcode exists in the page.</td>
                        <td>social media attributes for local pages. Each profile can be changed within the schema shortcode</td>
                        <td>New Field: Long / Lat: Input text, Add your business longitude / latitude values form google maps</td>
                    </tr>
                    <tr>
                        <th>V 2.0</th>
                        <td>Schema type input box replaced with select box by defined business type (LocalBusiness, Locksmith, AutomotiveBusiness)</td>
                        <td>Added Payment Methods input text, add payment methods, seperate with comma (',')</td>
                        <td>Added Accepted currency input text, add accepted currency either by symbol ($), or by name('USD').</td>
                    </tr>
                </tbody>
            </table>
            <hr>
        <h2>
            V 1.0
        </h2>
        <div class="description">

        Local Business Schema Fields
        Schema Type: input text, add schema type relevant to your business type<br>
        Logo: img, Select Brand's logo img<br>
        Brand name: input text, Add Brand name<br>
        Brand Description: input text, Add Brand description<br>
        Phone number: input text, Add Brand's main phone number<br>
        Street Address: input text, Add street address. select checkbox to show field's value on the front end<br>
        City Name: input text, Add city name. select checkbox to show field's value on the front end<br>
        Zip Code: input text, Add zip code. select checkbox to show field's value on the front end<br>
        Region: input text, Add region name. select checkbox to show field's value on the front end<br>
        Opening Hours: input text, Add opening hours and days by this format 'Mo-Su 00:00-23:59'. For multiple Hours, separate with comma (',')<br>
        </div>
    </div>