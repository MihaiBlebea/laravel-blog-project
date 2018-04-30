<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Request;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('admin.*', function($view) {
            $view->with('nav', [
                [
                    'name'  => 'users',
                    'route' => 'admin.users',
                ],
                [
                    'name'  => 'posts',
                    'route' => 'admin.posts',
                ],
                [
                    'name'  => 'categories',
                    'route' => 'admin.categories',
                ],
                [
                    'name'  => 'comments',
                    'route' => 'admin.comments',
                ]
            ]);
        });

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
