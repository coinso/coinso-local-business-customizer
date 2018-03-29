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

## How to use Parameters in shortcode?

add the shortcode to the required city page and add the parameters inside the shortcode:<br/>
[schema brand="New Brand Name" street="new street"]
Save and review schema on [Google Structured Data Testing Tool](https://search.google.com/structured-data/testing-tool/u/0/)


# Change Log
## v 2.0

* Schema type input box replaced with select box by defined business type
* Added Payment Methods input field
* Added Accepted currency field