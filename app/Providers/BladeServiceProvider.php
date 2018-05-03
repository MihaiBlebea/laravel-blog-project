<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Auth;

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
    }

    public function register()
    {
        //
    }
}
