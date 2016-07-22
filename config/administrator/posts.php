<?php

use App\Post;

return [

    'title' => '文章',
    'heading' => '文章管理',
    'single' => '文章',
    'model' => Post::class,

    'columns' => [
        'id' => [
            'title' => 'ID'
        ],
        'title' => [
            'title' => 'Title',
        ],
        'body' => [
            'title' => 'Content',
            'sortable' => false,
            'output' => function($value)
            {
                return str_limit($value);
            },
        ],
        'user_name' => [
            'title' => "Author",
            'relationship' => 'user', //this is the name of the Eloquent relationship method!
            'select' => "(:table).name",
        ],
        'created_at',

        'operation' => [
            'title'  => '管理',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'title' => [
            'title' => '标题',
            'type' => 'text'
        ],
        'body' => [
            'title' => '内容',
            'type' => 'textarea'
        ],
        'user' => array(
            'type' => 'relationship',
            'title' => 'Author',
            'name_field' => 'name',
        )
    ],

    'filters' => [
        'title' => [
            'title' => '标题',
        ]
    ],

];
