<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AdminSidebareMenuViewComposer
{
    public function compose(View $view)
    {
        $menu = [
            [
                'name'   => 'Dashboard',
                'slug'   => 'post/store',
                'route'  => 'user.dashboard',
                'params' => [],
                'roles'  => []
            ],
            [
                'name'   => 'write post',
                'slug'   => 'post/store',
                'route'  => 'post.store',
                'params' => [],
                'roles'  => []
            ],
            [
                'name'   => 'manage posts',
                'slug'   => 'posts/' . auth()->user()->slug,
                'route'  => 'post.index',
                'params' => ['user' => auth()->user()->slug],
                'roles'  => []
            ],
            [
                'name'   => 'update profile',
                'slug'   => 'admin/users/update',
                'route'  => 'user.update',
                'params' => [],
                'roles'  => []
            ],
            [
                'name'   => 'pages',
                'slug'   => 'pages',
                'route'  => 'page.manage',
                'params' => [],
                'roles'  => ['admin']
            ],
            [
                'name'   => 'users',
                'slug'   => 'admin/users',
                'route'  => 'user.manage',
                'params' => [],
                'roles'  => ['admin']
            ],
            [
                'name'   => 'categories',
                'slug'   => 'categories',
                'route'  => 'category.manage',
                'params' => [],
                'roles'  => ['admin']
            ],
            [
                'name'   => 'subscriptions',
                'slug'   => 'user/subscriptions',
                'route'  => 'user.subscriptions',
                'params' => [],
                'roles'  => []
            ]
        ];
        $view->with([
            'sidebar_nav' => $menu,
        ]);
    }
}