<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Website Meta Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the website meta tags for your application.
    | These will be used for web scraping and open graph tags
    | on sites such as Facebook and Twitter.
    |
    */
    'name'        => env('APP_NAME', 'Laravel'),
    'title'       => env('APP_NAME', 'Laravel'),
    'description' => env('APP_NAME', 'Laravel'),
    'email'       => 'support@sastodeal.com',
    'logo'        => '/img/logo.png',
    'favicon'     => '/img/favicon/favicon-32x32.png',
    'date_format' => 'd-M-Y',
    'local_types' => [ '' => '----------------------------', 'SLIDER' => 'Slider', 'BD' => 'Beast Deals', 'Coupon' => 'Product' ]
];
