<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

return array(
    
    // Regular
    '/module/polls/vote' => array(
        'controller' => 'Vote@voteAction'
    ),

    '/module/polls/results/(:var)' => array(
        'controller' => 'Vote@resultsAction'
    ),

    '/module/polls/web-page/vote' => array(
        'controller' => 'WebPage@voteAction'
    ),

    '/module/polls/web-page/results/(:var)' => array(
        'controller' => 'WebPage@resultsAction'
    ),

    // Web page related routes
    '/%s/module/polls/web-page/index/(:var)' => array(
        'controller' => 'Admin:WebPage@indexAction'
    ),

    '/%s/module/polls/web-page/save' => array(
        'controller' => 'Admin:WebPage@saveAction'
    ),

    '/%s/module/polls/web-page/edit/(:var)' => array(
        'controller' => 'Admin:WebPage@editAction'
    ),

    '/%s/module/polls/web-page/delete/(:var)' => array(
        'controller' => 'Admin:WebPage@deleteAction'
    ),
    
    '/%s/module/polls' => array(
        'controller' => 'Admin:Browser@indexAction'
    ),
    
    '/%s/module/polls/settings/(:var)' => array(
        'controller' => 'Admin:WebPage@settingsAction'
    ),
    
    '/%s/module/polls/tweak' => array(
        'controller' => 'Admin:Answer@tweakAction'
    ),

    '/%s/module/polls/category/view/(:var)' => array(
        'controller' => 'Admin:Browser@categoryAction'
    ),
    
    '/%s/module/polls/category/delete/(:var)' => array(
        'controller' => 'Admin:Category@deleteAction'
    ),
    
    '/%s/module/polls/category/add' => array(
        'controller' => 'Admin:Category@addAction'
    ),

    '/%s/module/polls/category/edit/(:var)' => array(
        'controller' => 'Admin:Category@editAction'
    ),
    
    '/%s/module/polls/category/save' => array(
        'controller' => 'Admin:Category@saveAction'
    ),
    
    '/%s/module/polls/answer/add/(:var)' => array(
        'controller' => 'Admin:Answer@addAction'
    ),
    
    '/%s/module/polls/answer/edit/(:var)' => array(
        'controller' => 'Admin:Answer@editAction'
    ),
    
    '/%s/module/polls/answer/save' => array(
        'controller' => 'Admin:Answer@saveAction'
    ),
    
    '/%s/module/polls/answer/delete/(:var)' => array(
        'controller' => 'Admin:Answer@deleteAction'
    ),

    '/%s/module/polls/answer/reset/(:var)' => array(
        'controller' => 'Admin:Answer@resetVotesAction'
    )
);
