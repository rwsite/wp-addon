<?php
/**
 * @year: 2019-06-26
 */

$general = [
    'title'  => __('General Settings', 'wp-addon'),
    'icon'   => 'fa fa-rocket',
];

if(defined('WPCF7_PLUGIN')){
$general['fields']['cf7'] = [
    'id'        => 'cf7',
    'type'      => 'fieldset',
    'title'     => __('Contact Form 7 settings', 'wp-addon'),
    'fields'    => [
        [
            'id'      => 'cf7_show_shortcode',
            'type'    => 'switcher',
            'title'   => __('Show additional shortcode?', 'wp-addon'),
            'default' => false
        ],
    ],
];
}

if(defined('POLYLANG_VERSION')){
    $general['fields'][] = [
        'id'        => 'pll',
        'type'      => 'fieldset',
        'title'     => __('Polylang settings', 'wp-addon'),
        'fields'    => [
            [
                'id'      => 'pll_hide_lang',
                'type'    => 'text',
                'title'   => __('Hide languages in wp Front. Enter lang slug, separated: ", ".', 'wp-addon'),
                'default' => '',
                'help'    => __('Space must be entered!', 'wp-addon')
            ],
        ],
    ];
}

$general['fields']['posts'] = [
        'id'        => 'posts',
        'type'      => 'fieldset',
        'title'     => __('Posts and Page Settings', 'wp-addon'),
        'fields'    => [
            [
                'id'      => 'show_id',
                'type'    => 'switcher',
                'title'   => __('Show posts IDs', 'wp-addon'),
                'default' => true
            ],
            [
                'id'      => 'show_thumbnail',
                'type'    => 'switcher',
                'title'   => __('Show posts thumbnails', 'wp-addon'),
                'default' => true
            ],
            [
                'id'      => 'change_excerpt',
                'type'    => 'switcher',
                'title'   => __('Change length post excerpt? To maximum 200 symbols.', 'wp-addon'),
                'default' => true
            ],
            [
                'id'      => 'exclude_cat',
                'type'    => 'switcher',
                'title'   => __('You can exclude specific category in frontend', 'wp-addon'),
                'default' => false
            ],
            [
                'id'      => 'exclude_cat_val',
                'type'    => 'textarea',
                'title'   => __('Enter category IDs separated by commas. Before ID you need a minus sign.', 'wp-addon'),
                'default' => '-6137, -24990, -24992, -24994, -24996, -24998, -25000, -25004, -25006',
                'help'    => __('Separeted: ", "', 'wp-addon'),
                'dependency' => ['exclude_cat', '==', 'true'],
            ],
        ],
    ];
$general['fields']['comments'] = [
        'id'        => 'comment',
        'type'      => 'fieldset',
        'title'     => __('Comment form', 'wp-addon'),
        'fields'    => [
            [
                'id'      => 'disable_comments',
                'type'    => 'switcher',
                'title'   => __('Disable all comments', 'wp-addon'),
                'default' => true
            ],
            [
                'id'      => 'disable_comment_nofollow',
                'type'    => 'switcher',
                'title'   => __('Disable link Nofollow in comment', 'wp-addon'),
                'default' => false
            ],
            [
                'id'    => 'remove_site_field_in_comment',
                'type'    => 'switcher',
                'title'   => __('Remove site field in comment', 'wp-addon'),
                'default' => true
            ],
        ],
    ];
$general['fields']['tiny-mce'] = [
        'id'     => 'tiny-mce',
        'type'   => 'fieldset',
        'title'  => __('TinyMCE Settings', 'wp-addon'),
        'fields' => [
            [
                'id'      => 'disable_guttenberg',
                'type'    => 'switcher',
                'title'   => __('Disable guttenber?', 'wp-addon'),
                'default' => true
            ],
            [
                'id'      => 'tiny_custom_colors',
                'type'    => 'switcher',
                'title'   => __('Add platform color to tinyMCE', 'wp-addon'),
                'default' => true
            ],
            [
                'id'      => 'tiny_enable_opensans',
                'type'    => 'switcher',
                'title'   => __('Enable "Open Sans" google font for tinyMCE.', 'wp-addon'),
                'default' => true
            ],
            [
                'id'    => 'tiny_advanced',
                'type'  => 'switcher',
                'title'   => __('Add TinyMCE Advanced functions', 'wp-addon'),
                'label' => __('Add third column and additional setting to tinyMCE (fonts, sizes, formats and backgrounds settings)', 'wp-addon'),
                'default' => true
            ],
            [
                'id'    => 'add_bootstrap_3',
                'type'  => 'switcher',
                'title'   => __('Add Bootsrtrap 3', 'wp-addon'),
                'label' => __('Add Bootsrtrap 3 code to TinyMCE', 'wp-addon'),
                'default' => true
            ],
        ],
    ];
$general['fields']['yoast'] = [
        'id'        => 'yoast',
        'type'      => 'fieldset',
        'title'     => __('SEO Settings (Yoast required)', 'wp-addon'),
        'fields'    => [
            [
                'id'      => 'yoast_remove_transients',
                'type'    => 'switcher',
                'title'   => __('Cleanup daily options \'_cache_validator\'. D`ont touch it if you d`ont know how it work.', 'wp-addon'),
                'default' => false
            ],
            [
                'id'      => 'img_alt_in_upload',
                'type'    => 'switcher',
                'title'   => __('Set Alt in updload from Title media', 'wp-addon'),
                'default' => true
            ],
            [
                'id'      => 'transliteration_enable',
                'type'    => 'switcher',
                'title'   => __('Enable transliteration?', 'wp-addon'),
                'default' => true
            ],
            [
                'id'      => 'index_disable',
                'type'    => 'switcher',
                'title'   => __('Disable site indexing.', 'wp-addon'),
                'label'   => __('Exclude all pages from search. 
                                                    Enable it if your site is placement to Test host.', 'wp-addon'),
                'default' => false
            ],
            [
                'id'      => 'redirect_enable',
                'type'    => 'switcher',
                'title'   => __('Enable redirect addon?', 'wp-addon'),
                'default' => true
            ],
        ],
    ];
$general['fields']['guid'] = [
        'id'        => 'guid',
        'type'      => 'fieldset',
        'title'     => __('Data Base Optimization', 'wp-addon'),
        'fields'    => [
            [
                'id'      => 'write_right_guid',
                'type'    => 'switcher',
                'title'   => __('Write right link to guid for New posts.', 'wp-addon'),
                'default' => true
            ],
            [
                'id'      => 'fix_guid',
                'type'    => 'switcher',
                'title'   => __('This option enable interface for replace wp guide to right GUID.', 'wp-addon'),
                'help'  => __('???????? guid ?????????????? wp_posts ?????????????? ?????? ???????????????? ?????? ?????????????????????? ???????????????? - ???????????????????????????? ????????????. 
                                    ?????????? ???? ?????? ?????????????????????????? ???????????? ?? RSS ??????????. GUID ?????? ?? ????????????????????????????????: Globally Unique Identifier - ???????????????????? ???????????????????? ??????????????????????????. 
                                    ???? ?????????? ???????? ?????????????? RSS ???????????????????? ???????????????????????? ?????? ???????????? ?????? ??????. 
                                    ???????????? ?????????????? ???????????????????????? ???? ?????????????????????? ???????????? ?????? ????????, ???????????? ??????????????, ???????? ???????? ?????? ???????? ???????????????? ???? ???????????? ??????????. 
                                    ???????? ?????? ???????? ????????????????, ???? ???????? ???????????????? RSS, ?????????? ???????????????? ???????? ?????? ???????????????????????????? ????????????????????.', 'wp-addon'),
                'desc'  => __('If you url is include %category%, %tag%, %author%, you can use this option for repair GUID(url) in your database.', 'wp-addon'),
                'default' => false
            ],
        ],
    ];

$general['fields']['terms'] = [
        'id'      => 'show_all_cats_custom_fileds',
        'type'    => 'switcher',
        'title'   => __('Show custom fields in categories', 'wp-addon'),
        'default' => false
];
