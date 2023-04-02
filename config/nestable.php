<?php

return [
    'parent' => 'parent_id',
    'primary_key' => 'id',
    'generate_url' => true,
    'childNode' => 'child',
    'body' => [
        'id',
        'title',
    ],
    'html' => [
        'label' => 'name',
        'href' => 'slug'
    ],
    'dropdown' => [
        'prefix' => ' - ',
        'label' => 'title',
        'value' => 'id'
    ]
];
