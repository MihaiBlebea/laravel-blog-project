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
        Blade::directive('role', function($role) {
            return "<?php if (auth()->check() && auth()->user()->hasRole( {$role} )): ?>";
        });
        Blade::directive('endrole', function() {
            return '<?php endif; ?>';
        });
        Blade::directive('can', function($permission) {
            return "<?php if (auth()->check() && auth()->user()->hasPermissionTo( {$permission} )): ?>";
        });
        Blade::directive('endcan', function() {
            return '<?php endif; ?>';
        });

        // Check if the model for search is Post
        Blade::if('search', function($model) {
            return $model == Request::input('model');
        });

        // Check if the auth User is subscribed to a particular user
        Blade::if('subscribed', function(User $user) {
            return auth()->check() && auth()->user()->isSubscribed($user);
        });

        // Check if the auth User has any of these role => array of role
        Blade::if('hasAnyRole', function(Array $roles) {
            return auth()->check() && auth()->user()->hasAnyRole($roles);
        });

        // Check if an $user has setup a profile model
        Blade::if('hasProfile', function(User $user) {
            return (bool) $user->profile()->count();
        });
    }

    public function register()
    {
        //
    }
}
