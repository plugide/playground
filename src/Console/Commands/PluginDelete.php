<?php

namespace Plugide\Playground\Console\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;
use Plugide\Define\Plug;
use Plugide\Playground\Support\Resolver;
use Symfony\Component\Console\Input\InputOption;

class PluginDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:plugin {name} {--type=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a plugin';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $type = $this->option('type') ?? Plug::data('config.default');
        $name = $this->argument('name');

        $plugin = Resolver::make($name, $type)->plugin();

        if ($plugin) {
            File::deleteDirectory($plugin->path());
            $this->info($plugin->type()->name.' '.$plugin->display_name. ' delete successfully');
        } else {
            $this->info($name. ' not exist');
        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['type', null, InputOption::VALUE_OPTIONAL, 'Delete a plugin for the given type.'],
        ];
    }
}
