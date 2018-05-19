<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Models\User;
use Request;

class BladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Check if the auth User can do an action
        Blade::if('can', function(String $permission) {
            return auth()->check() && auth()->user()->hasPermissionTo($permission);
        });

        // Check if the auth User has this specific role
        Blade::if('role', function(String $role) {
            return auth()->check() && auth()->user()->hasRole($role);
        });

        // Check if the auth User has any of these role => array of role
        Blade::if('hasAnyRole', function(Array $roles) {
            return auth()->check() && auth()->user()->hasAnyRole($roles);
        });

        // Check if an $user has setup a profile model
        Blade::if('hasProfile', function(User $user) {
            return (bool) isset($user->profile) && $user->profile()->count();
        });
    }

    public function register()
    {
        //
    }
}
