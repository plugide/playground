<?php

namespace Plugide\Playground\Providers;

use Illuminate\Support\ServiceProvider;
use Plugide\Playground\Console\Commands;
use Plugide\Playground\Console\Generators;

class CommandServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            Commands\PluginDelete::class,
            Commands\PluginList::class,
            Commands\PluginMake::class,
            Generators\CastMakeCommand::class,
            Generators\ChannelMakeCommand::class,
            Generators\ControllerMakeCommand::class,
            Generators\ComponentMakeCommand::class,
            Generators\ConsoleMakeCommand::class,
            Generators\EventMakeCommand::class,
            Generators\FactoryMakeCommand::class,
            Generators\JobMakeCommand::class,
            Generators\ListenerMakeCommand::class,
            Generators\MigrateMakeCommand::class,
            Generators\MiddlewareMakeCommand::class,
            Generators\ModelMakeCommand::class,
            Generators\NotificationMakeCommand::class,
            Generators\ObserverMakeCommand::class,
            Generators\PolicyMakeCommand::class,
            Generators\ProviderMakeCommand::class,
            Generators\RequestMakeCommand::class,
            Generators\ResourceMakeCommand::class,
            Generators\RuleMakeCommand::class,
            Generators\SeederMakeCommand::class,
            Generators\TestMakeCommand::class
        ]);
    }
}
