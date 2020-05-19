<?php

$return['validation_cases'] = [
    'strict_alpha' => '/[a-zA-Z]/',
    'alpha_space'  => '/[a-zA-Z ]/',
    'alpha_num'    => '/^[a-zA-Z0-9\s]*$/',
    'alnum'        => '/^[[:alnum:]]{1,}$/',
    'integer'      => '/[0-9]/',
    'xml'          => '/[a-zA-Z0-9\>\<\/ ]$/',
    'url'          => '/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'
];
$return['mandatory']        = [
    '2' => [
        'single_ad' => [
            'title'                 => 'alpha_num',
            'objective'             => 'integer',
            'campaignid'            => 'integer',
            'ctaText'               => 'alpha_space',
            'linkFallback'          => 'url',
            'imageIcon'             => 'url',
            'imageMain'             => 'url',
            'additionalCreatives'   => [
                '240x260' => 'url',
                '320x184' => 'url',
            ],
            'video'                 => 'xml',
            'impTrackers'           => [
                '0' => 'url',
                '1' => 'url'
            ],
            'clickTrackers'         => [
                '0' => 'url',
                '1' => 'url'
            ],
            'customImage'           => 'url',
            'creativeViewTrackers'  => [
                '0' => 'url'
            ],
            'creativeClickTrackers' => [
                '0' => 'url'
            ]
        ]
    ]
];
$return['optional']         = [
    '2' => [
        'single_ad' => [
            'linkUrl'     => 'url',
            'desc'        => 'alpha_num',
            'rating'      => 'integer',
            'downloads'   => 'integer',
            'price'       => 'integer',
            'imageMedium' => 'url',
            'imageBanner' => 'url',
            'imageTile'   => 'alpha_num',
            'audio'       => 'integer',
            'sponsored'   => 'alpha_num',
            'desc2'       => 'alpha_num',
            'likes'       => 'integer',
            'salePrice'   => 'integer',
            'phone'       => 'integer',
            'address'     => 'alpha_num',
            'displayUrl'  => 'url'
        ]
    ]
];
$return['error_codes']      = [
    'E00' => ['message' => 'OK'],
    'E01' => ['message' => 'Empty response'],
    'E02' => ['message' => 'Invalid adtype or type.'],
    'E03' => ['message' => 'Mandatory :attribute missing or empty.'],
    'E04' => ['message' => ':attribute validation failed.'],
    'E05' => ['message' => 'Configuration not available.'],
    'I00' => ['message' => 'Unknown']
];

return $return;
