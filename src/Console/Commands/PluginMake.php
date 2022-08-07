<?php

namespace Plugide\Playground\Console\Commands;

use Illuminate\Console\Command;
use Plugide\Define\Plug;
use Plugide\Playground\Support\Resolver;
use Symfony\Component\Console\Input\InputOption;

class PluginMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:plugin {name} {--type=}  {--stub=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new plugin';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!file_exists(Plug::folder())) {
            mkdir(Plug::folder(), 0755, true);
        }

        $name = $this->argument('name');
        $type = $this->option('type') ?? Plug::data('config.default');
        $stub = $this->option('stub');

        $response = Resolver::make($name, $type)->generate($stub)->build();

        if (!$response['status']) {
            $this->error($response['message']);
        } elseif ($response['status']) {
            $this->info($response['message']);
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
            ['type', null, InputOption::VALUE_OPTIONAL, 'Generate a plugin for the given type.'],
            ['stub', null, InputOption::VALUE_OPTIONAL, 'Define stub.'],
        ];
    }
}
