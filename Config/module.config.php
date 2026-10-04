<?php

/**
 * Module configuration container
 */

return [
    'name'  => 'Polls',
    'description' => 'Polls module lets you to easily manage polls on your site',
    'menu' => [
        'name' => 'Polls',
        'icon' => 'fas fa-poll',
        'items' => [
            [
                'route' => 'Polls:Admin:Browser@indexAction',
                'name' => 'View all polls'
            ],
            [
                'route' => 'Polls:Admin:Answer@addAction',
                'name' => 'Add new answer'
            ],
            [
                'route' => 'Polls:Admin:Category@addAction',
                'name' => 'Add new category'
            ]
        ]
    ]
];