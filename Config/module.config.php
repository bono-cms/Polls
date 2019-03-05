<?php

/**
 * Module configuration container
 */

return array(
    'name'  => 'Polls',
    'description' => 'Polls module lets you to easily manage polls on your site',
    'menu' => array(
        'name' => 'Polls',
        'icon' => 'fas fa-poll',
        'items' => array(
            array(
                'route' => 'Polls:Admin:Browser@indexAction',
                'name' => 'View all polls'
            ),
            array(
                'route' => 'Polls:Admin:Answer@addAction',
                'name' => 'Add new answer'
            ),
            array(
                'route' => 'Polls:Admin:Category@addAction',
                'name' => 'Add new category'
            )
        )
    )
);