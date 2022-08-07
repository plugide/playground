<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Console\Command;
use Plugide\Define\Plugin;

class MigrateMakeCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'plug:migration {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--plug= : Plugin handle.}
        {--path= : The location where the migration file should be created}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $arguments = $this->argument();

        $element = Plugin::where('handle', $this->option('plug'))->first();

        $option = $this->option();
        $options = [];

        array_walk($option, function (&$value, $key) use (&$options) {
            $options['--' . $key] = $value;
        });

        unset($options['--path']);
        unset($options['--plug']);

        $options['--path'] = str_replace(base_path().'\\', '', $element->path('database/migrations'));

        return $this->call('make:migration', array_merge($arguments, $options));
    }
}
