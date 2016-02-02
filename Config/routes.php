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
    '/admin/module/polls' => array(
        'controller' => 'Admin:Browser@indexAction'
    ),
    
    '/admin/module/polls/tweak' => array(
        'controller' => 'Admin:Answer@tweakAction'
    ),

    '/admin/module/polls/category/view/(:var)' => array(
        'controller' => 'Admin:Browser@categoryAction'
    ),
    
    '/admin/module/polls/category/delete' => array(
        'controller' => 'Admin:Category@deleteAction'
    ),
    
    '/admin/module/polls/category/add' => array(
        'controller' => 'Admin:Category@addAction'
    ),

    '/admin/module/polls/category/edit/(:var)' => array(
        'controller' => 'Admin:Category@editAction'
    ),
    
    '/admin/module/polls/category/save' => array(
        'controller' => 'Admin:Category@saveAction'
    ),
    
    '/admin/module/polls/answer/add' => array(
        'controller' => 'Admin:Answer@addAction'
    ),
    
    '/admin/module/polls/answer/edit/(:var)' => array(
        'controller' => 'Admin:Answer@editAction'
    ),
    
    '/admin/module/polls/answer/save' => array(
        'controller' => 'Admin:Answer@saveAction'
    ),
    
    '/admin/module/polls/answer/delete' => array(
        'controller' => 'Admin:Answer@deleteAction'
    )
);
