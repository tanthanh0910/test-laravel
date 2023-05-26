<?php

namespace App\Core\Demo\Src\Providers;

use Illuminate\Support\ServiceProvider;

class DemoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'botble-demo');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}
