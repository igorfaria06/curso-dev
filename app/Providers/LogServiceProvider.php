<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Log;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->bind('geraLog', function($app, $params){
            return Log::info('Gera Log', $params);
        });
    }
}
