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
        View::composer('admin.*', function($view) {
            $view->with('sidebar_nav', [
                [
                    'name'  => 'users',
                    'slug' => '',
                    'route' => 'admin.users',
                    'params' => [],
                ],
                [
                    'name'  => 'posts',
                    'slug' => '',
                    'route' => 'admin.posts',
                    'params' => [],
                ],
                [
                    'name'  => 'categories',
                    'slug' => '',
                    'route' => 'admin.categories',
                    'params' => [],
                ],
                [
                    'name'  => 'comments',
                    'slug' => '',
                    'route' => 'admin.comments',
                    'params' => [],
                ]
            ]);
        });

        // Profile sidebar navigation
        View::composer(['user.*', 'post.create'], function($view) {
            // $user = $view->getData()['user'];

            $view->with('sidebar_nav', [
                [
                    'name'   => 'profile',
                    'slug'   => 'user/profile',
                    'route'  => 'user.profile',
                    'params' => [],
                ],
                [
                    'name'   => 'write',
                    'slug'   => 'user/new/post',
                    'route'  => 'user.post.new',
                    'params' => [],
                ],
                [
                    'name'   => 'edit profile',
                    'slug'   => 'user/update',
                    'route'  => 'user.update',
                    'params' => [],
                ],
                [
                    'name'   => 'posts',
                    'slug'   => 'user/posts',
                    'route'  => 'user.posts',
                    'params' => [],
                ],
                [
                    'name'   => 'repos',
                    'slug'   => 'user/repos',
                    'route'  => 'user.repos',
                    'params' => [],
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
