<?php

namespace Plugide\Playground\Console\Commands;

use Illuminate\Console\Command;
use Plugide\Define\Plug;

class PluginList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:plugin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all plugins';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->table(['Name', 'Type', 'Status', 'Core', 'Installed', 'Folder'], $this->getRows());
    }

    /**
     * Get table rows.
     *
     * @return array
     */
    public function getRows()
    {
        $rows = [];

        foreach (Plug::plugins() as $package) {
            $rows[] = [
                $package->name,
                $package->type,
                $package->active ? 'Enabled' : 'Disabled',
                $package->core ? 'true' : 'false',
                $package->installed ? 'true' : 'false',
                str_replace(base_path().'\\', "", $package->path()),
            ];
        }
        return $rows;
    }
}
