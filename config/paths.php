<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Paths
    |--------------------------------------------------------------------------
    |
    | These values determine the image upload location for various models.
    | Folder name only.
    |
    */

    'image' => [

        'User'            => 'avatars',
        'Page'            => 'banners',
        'Staff'           => 'avatars',
        'Client'          => 'clients',
        'Customer'        => 'avatars',
        'Certificate'     => 'certificates',
        'Service'         => 'services',
        'Slide'           => 'slides',
        'Feature'         => 'features',
        'OperatingSystem' => 'operating-systems',
        'DataCenter'      => 'data-centers'

    ],

    /*
    |--------------------------------------------------------------------------
    | Icon Paths
    |--------------------------------------------------------------------------
    |
    | These values determine the icon upload location for various models.
    | Paths should be finished with '/'
    |
    */

    'icon' => [


    ],

    /*
    |--------------------------------------------------------------------------
    | Placeholder Paths
    |--------------------------------------------------------------------------
    |
    | These values determine the placeholder paths for various types.
    | Paths should be preceded and finished with '/'
    |
    */

    'placeholder' => [

        'default' => 'img/placeholder.jpg',
        'avatar'  => 'img/avatar.png',

    ]
];