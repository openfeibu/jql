<?php

return [

/*
 * Modules .
 */
    'modules'  => ['course'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'course'     => [
        'model'        => 'App\Models\Course',
        'table'        => 'courses',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['description','image','year','month','order'],
        'translate'    => ['description','image','year','month','order'],
        'upload_folder' => '/course',
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [
            'description' => 'like',
        ],
    ],

];
