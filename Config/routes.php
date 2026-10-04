<?php

/**
 * This file is part of the Bono CMS
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

return [
    // Regular
    '/module/polls/vote' => [
        'controller' => 'Vote@voteAction'
    ],

    '/module/polls/results/(:var)' => [
        'controller' => 'Vote@resultsAction'
    ],

    '/module/polls/web-page/vote' => [
        'controller' => 'WebPage@voteAction'
    ],

    '/module/polls/web-page/results/(:var)' => [
        'controller' => 'WebPage@resultsAction'
    ],

    // Web page related routes
    '/%s/module/polls/web-page/index/(:var)' => [
        'controller' => 'Admin:WebPage@indexAction'
    ],

    '/%s/module/polls/web-page/save' => [
        'controller' => 'Admin:WebPage@saveAction'
    ],

    '/%s/module/polls/web-page/edit/(:var)' => [
        'controller' => 'Admin:WebPage@editAction'
    ],

    '/%s/module/polls/web-page/delete/(:var)' => [
        'controller' => 'Admin:WebPage@deleteAction'
    ],
    
    '/%s/module/polls' => [
        'controller' => 'Admin:Browser@indexAction'
    ],
    
    '/%s/module/polls/settings/(:var)' => [
        'controller' => 'Admin:WebPage@settingsAction'
    ],
    
    '/%s/module/polls/tweak' => [
        'controller' => 'Admin:Answer@tweakAction'
    ],

    '/%s/module/polls/category/view/(:var)' => [
        'controller' => 'Admin:Browser@categoryAction'
    ],
    
    '/%s/module/polls/category/delete/(:var)' => [
        'controller' => 'Admin:Category@deleteAction'
    ],
    
    '/%s/module/polls/category/add' => [
        'controller' => 'Admin:Category@addAction'
    ],

    '/%s/module/polls/category/edit/(:var)' => [
        'controller' => 'Admin:Category@editAction'
    ],
    
    '/%s/module/polls/category/save' => [
        'controller' => 'Admin:Category@saveAction'
    ],
    
    '/%s/module/polls/answer/add/(:var)' => [
        'controller' => 'Admin:Answer@addAction'
    ],
    
    '/%s/module/polls/answer/edit/(:var)' => [
        'controller' => 'Admin:Answer@editAction'
    ],
    
    '/%s/module/polls/answer/save' => [
        'controller' => 'Admin:Answer@saveAction'
    ],
    
    '/%s/module/polls/answer/delete/(:var)' => [
        'controller' => 'Admin:Answer@deleteAction'
    ],

    '/%s/module/polls/answer/reset/(:var)' => [
        'controller' => 'Admin:Answer@resetVotesAction'
    ]
];