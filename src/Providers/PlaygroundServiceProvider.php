<?php

namespace Plugide\Playground\Providers;

use Illuminate\Support\ServiceProvider;
use Plugide\Define\Plug;

class PlaygroundServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(CommandServiceProvider::class);

        Plug::addStub(dirname(__DIR__).'/../stubs/plugin');
        Plug::addStub(dirname(__DIR__).'/../stubs/lite');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
