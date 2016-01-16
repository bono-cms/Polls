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
    
    '/admin/module/polls/save.ajax' => array(
        'controller' => 'Admin:Browser@saveAction'
    ),
    
    '/admin/module/polls/delete-selected.ajax' => array(
        'controller' => 'Admin:Browser@deleteSelectedAction'
    ),

    '/admin/module/polls/category/view/(:var)' => array(
        'controller' => 'Admin:Browser@categoryAction'
    ),
    
    '/admin/module/polls/category/delete.ajax' => array(
        'controller' => 'Admin:Browser@deleteCategoryAction'
    ),
    
    '/admin/module/polls/category/add' => array(
        'controller' => 'Admin:Category:Add@indexAction'
    ),

    '/admin/module/polls/category/add.ajax' => array(
        'controller' => 'Admin:Category:Add@addAction'
    ),

    '/admin/module/polls/category/edit/(:var)' => array(
        'controller' => 'Admin:Category:Edit@indexAction'
    ),
    
    '/admin/module/polls/category/edit.ajax' => array(
        'controller' => 'Admin:Category:Edit@updateAction'
    ),
    

    '/admin/module/polls/answer/add' => array(
        'controller' => 'Admin:Answer:Add@indexAction'
    ),

    '/admin/module/polls/answer/add.ajax' => array(
        'controller' => 'Admin:Answer:Add@addAction'
    ),
    
    '/admin/module/polls/answer/edit/(:var)' => array(
        'controller' => 'Admin:Answer:Edit@indexAction'
    ),
    
    '/admin/module/polls/answer/edit.ajax' => array(
        'controller' => 'Admin:Answer:Edit@updateAction'
    ),
    
    '/admin/module/polls/answer/delete.ajax' => array(
        'controller' => 'Admin:Browser@deleteAction'
    )
);
