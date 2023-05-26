<?php

namespace App\Providers;

use App\Http\Middleware\LogMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LogMiddleware::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->checkRoles();
    }

    public function checkRoles()
    {
        \Blade::if('hasPermission', function ($actionName = null) {
            $user = Auth::user();
            return $user->hasPermission($actionName);
        });

        \Blade::if('hasAtLeastOnePermission', function ($actionName = []) {
            $user = Auth::user();
            foreach ($actionName as $value) {
                if ($user->hasPermission($value))
                    return true;
            }
            return false;
        });
    }
}
