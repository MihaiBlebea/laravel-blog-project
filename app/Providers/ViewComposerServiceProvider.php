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
        // Admin sidebar navigation
        View::composer(['admin.*', 'post.create', 'category.*'], function($view) {
            $menu = [
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
                    'route'  => 'post.index',
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
                    'slug'   => 'categories',
                    'route'  => 'category.index',
                    'params' => [],
                    'roles'  => ['admin']
                ],
                [
                    'name'   => 'subscriptions',
                    'slug'   => 'user/subscriptions',
                    'route'  => 'user.subscriptions',
                    'params' => [],
                    'roles'  => []
                ],
                [
                    'name'   => 'gitHub repos',
                    'slug'   => 'repos',
                    'route'  => 'repos',
                    'params' => [],
                    'roles'  => []
                ],
            ];
            $view->with([
                'sidebar_nav' => $menu,
            ]);
        });

        // Blog / Category / Post breadcrumbs
        View::composer(['layouts._post', 'layouts._category'], function($view) {
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
