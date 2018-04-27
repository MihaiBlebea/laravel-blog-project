<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

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
    }

    public function register()
    {
        //
    }
}
