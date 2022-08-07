<?php

namespace Plugide\Playground\Console\Commands;

use Illuminate\Console\Command;
use Plugide\Define\Plugin;

class PluginSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:plugin {plugin?} {--class=}  {--database=} {--force=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the database with records for a specific or all plugins';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->argument('plugin')) {
            $plugin = Plugin::where('handle', $this->argument('plugin'))->first();

            if (! $plugin) {
                $this->error('Plugin does not exist.');
                return ;
            }

            $this->seed($plugin);
        } else {
            foreach (Plugin::all() as $plugin) {
                $this->seed($plugin);
            }
        }
    }

    /**
     * Seed the specific plugin.
     *
     * @param  $plugin
     * @return void
     */
    protected function seed($plugin)
    {
        $params        = [];
        $namespace = 'Database\\Seeders\\'. $plugin->namespace();
        $fullPath = $namespace.'\\'.'DatabaseSeeder';

        if (class_exists($fullPath)) {
            if ($this->option('class')) {
                $params['--class'] = $this->option('class');
            } else {
                $params['--class'] = $fullPath;
            }

            if ($option = $this->option('database')) {
                $params['--database'] = $option;
            }

            if ($option = $this->option('force')) {
                $params['--force'] = $option;
            }

            $this->call('db:seed', $params);
        }
    }
}
