<?php

return [

/*
 * Modules .
 */
    'modules'  => ['message'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'message'     => [
        'model'        => 'App\Models\Message',
        'table'        => 'messages',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['ip', 'company', 'name', 'tel', 'content','created_at','updated_at'],
        'translate'    => ['ip', 'company', 'name', 'tel', 'content'],
        'upload_folder' => '/page/page',
        'encrypt'      => ['id'],
        'revision'     => ['name', 'title'],
        'perPage'      => '20',
        'search'        => [
            'company'  => 'like',
        ],
    ],

];
