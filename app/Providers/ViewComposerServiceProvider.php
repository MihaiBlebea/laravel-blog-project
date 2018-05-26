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
        // Homepage
        View::composer('pages.page.home', \App\Http\ViewComposers\HomePageViewComposer::class);

        // Admin sidebar navigation
        View::composer([
            'admin.*',
            'post.*',
            'category.*',
            'pages.index',
            'images.image',
            'projects.store'
        ], \App\Http\ViewComposers\AdminSidebareMenuViewComposer::class);

        // Blog / Category / Post breadcrumbs
        View::composer(['pages.blog.*'], \App\Http\ViewComposers\BreadcrumbsViewComposer::class);
    }

    public function register()
    {
        //
    }
}
