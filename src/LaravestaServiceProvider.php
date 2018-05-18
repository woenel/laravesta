<?php

namespace Woenel\Laravesta;

use Illuminate\Support\ServiceProvider;

class LaravestaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/laravesta.php' => config_path('laravesta.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('Laravesta', 'Woenel\Laravesta\Laravesta');
    }
}