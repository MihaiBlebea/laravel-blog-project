<?php

return [

    /*

    [
        'name'   => 'create',
        'slug'   => 'user/posts',
        'route'  => 'user.posts',
        'params' => [],
        'roles'  => ['guest', 'editor']
    ],

    */

    'menu' => [
        [
            'name'   => 'write post',
            'slug'   => 'admin/post/create',
            'route'  => 'admin.post.create',
            'params' => [],
            'roles'  => ['admin']
        ],
        [
            'name'   => 'manage post',
            'slug'   => 'admin/posts',
            'route'  => 'admin.posts',
            'params' => [],
            'roles'  => ['admin']
        ],
        [
            'name'   => 'profile',
            'slug'   => 'admin/profile',
            'route'  => 'admin.profile',
            'params' => [],
            'roles'  => []
        ],
        [
            'name'   => 'update profile',
            'slug'   => 'admin/profile/update',
            'route'  => 'admin.profile.update',
            'params' => [],
            'roles'  => []
        ],
        [
            'name'   => 'pages',
            'slug'   => '',
            'route'  => 'user.posts',
            'params' => [],
            'roles'  => ['admin']
        ],
        [
            'name'   => 'users',
            'slug'   => 'admin/users',
            'route'  => 'admin.users',
            'params' => [],
            'roles'  => ['admin']
        ],
        [
            'name'   => 'categories',
            'slug'   => '',
            'route'  => 'user.posts',
            'params' => [],
            'roles'  => ['admin']
        ],
        [
            'name'   => 'subscriptions',
            'slug'   => '',
            'route'  => 'user.posts',
            'params' => [],
            'roles'  => []
        ],
        [
            'name'   => 'gitHub repos',
            'slug'   => '',
            'route'  => 'user.posts',
            'params' => [],
            'roles'  => []
        ],
    ]

];