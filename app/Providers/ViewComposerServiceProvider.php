<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Request;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Admin sidebar navigation
        View::composer('admin.*', function($view) {
            $view->with('sidebar_nav', [
                [
                    'name'  => 'users',
                    'route' => 'admin.users',
                    'params' => [],
                ],
                [
                    'name'  => 'posts',
                    'route' => 'admin.posts',
                    'params' => [],
                ],
                [
                    'name'  => 'categories',
                    'route' => 'admin.categories',
                    'params' => [],
                ],
                [
                    'name'  => 'comments',
                    'route' => 'admin.comments',
                    'params' => [],
                ]
            ]);
        });

        // Profile sidebar navigation
        View::composer('user.*', function($view) {
            $user = Request::user();

            $view->with('sidebar_nav', [
                [
                    'name'  => 'profile',
                    'route' => "user.profile",
                    'params' => ['user' => $user->id],
                ],
                [
                    'name'  => 'update',
                    'route' => 'user.update',
                    'params' => ['user' => $user->id],
                ],
                [
                    'name'  => 'posts',
                    'route' => 'user.posts',
                    'params' => ['user' => $user->id],
                ],
                [
                    'name'  => 'repos',
                    'route' => 'user.repos',
                    'params' => ['user' => $user->id],
                ]
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
