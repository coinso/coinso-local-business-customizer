# Coisno Local Business Customizer
Add schema.org structured data to your city pages with an easy to use shortcode
In order to use this plugin Download from <b>[git repository](https://github.com/coinso/coinso-local-business-customizer)</b>
Install
go to WP customizer - Local Business Information Panel
Add Required Information:
Social Profiles
Business information
At your home page, add the required [schema] shortcode.
Publish / Update page, test schema at the [Google Structured Data Testing Tool](https://search.google.com/structured-data/testing-tool/u/0/)
## Home page schema
At the homepage you will get 2 types of structured data - html and ld+json.
On inner pages you'll get only html
in Order to use the plugin for more than one location see Available Parameters bellow
## Available Shortcode Parameters

### Brand name and description
* brand
* description

#### Address
* street
* city
* region
* zip

### General info
* phone
* hours
* map

### Social
* facebook
* twitter
* gmb
* yelp

### Reviews (since V 2.2)
* rating
* total_reviews
* cta


## How to use the shortcode attributes (atts)?

add the shortcode to the required city page and add the parameters inside the shortcode:<br/>
[schema brand="New Brand Name" street="new street"]
Save and review schema on [Google Structured Data Testing Tool](https://search.google.com/structured-data/testing-tool/u/0/)

# Change Log
## V 2.3
Added Plugin Information Page 

# Change Log
## V 2.2.4 - Bug Fix
Fixed - local-business-schema-plugin-content.php, line 182 - was an error due to wrong $schema_atts key 


# Change Log
## V 2.2.3
prefixed "is_decimal" function and moved it to the main plugin page

# Change Log
## V 2.2.2
* Removed 'Office Services are by Appointment Only' note

## V 2.2.1
* Fixed error made by empty review fields
* Added conditions to show review fields

## V 2.2 - Added google rating
- Now you can add you google listing rating + a link to your GMB listing.<br>
  New atts inside the shortcode:
    * rating - insert listing's avg. rating
    * total_reviews - insert listing's total review count
    * cta - change the 'Write a Review' button text
- Added Rating / Reviews section in the customizer
- Added Social Networks (BBB, linkedin ) & changed google plus to GMB listing

- Added [Plugin Update Checker](https://github.com/YahnisElsts/plugin-update-checker#github-integration) By [Yahnis Elsts](https://github.com/YahnisElsts)

## V 2.1
- ld/json script to load on home page, only if the schema shortcode exists in the page.
- social media attributes for local pages. Each profile can be changed within the schema shortcode
- New Field: Long / Lat: Input text, Add your business longitude / latitude values form google maps 

## V 2.0

* Schema type input box replaced with select box by defined business type (LocalBusiness, Locksmith, AutomotiveBusiness)<br>
* Added Payment Methods input text, add payment methods, seperate with comma (',')<br>
* Added Accepted currency input text, add accepted currency either by symbol ($), or by name('USD').<br>

## V 1.0

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


