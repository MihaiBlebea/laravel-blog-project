<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Request;
use Auth;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('pages.page.home', \App\Http\ViewComposers\HomePageViewComposer::class);

        // Admin sidebar navigation
        View::composer(['admin.*', 'post.create', 'category.*', 'pages.index'], function($view) {
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
                    'slug'   => 'admin/profile/update',
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
        });

        // Blog / Category / Post breadcrumbs
        View::composer(['pages.blog.*'], function($view) {
            $params = explode('/', Request::path());
            $breadcrumbs = [];
            foreach($params as $index => $param)
            {
                if($index == 0)
                {
                    $breadcrumbs[$index]['url'] = '/' . $param;
                } else {
                    $breadcrumbs[$index]['url'] = $breadcrumbs[$index - 1]['url'] . '/' . $param;
                }
                $breadcrumbs[$index]['name'] = $param;
            }
            $view->with('breadcrumbs', $breadcrumbs);
        });
    }

    public function register()
    {
        //
    }
}
