<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Database\Console\Seeds\SeederMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class SeederMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:seeder';

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $namespace = 'Database\\Seeders\\'.$this->getPlugin()->namespace();

        $replace = [
            'Database\Seeders' => $namespace,
        ];

        return str_replace(
            array_keys($replace),
            array_values($replace),
            parent::buildClass($name)
        );
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        if (is_dir($this->getPlugin()->path('database').'/seeds')) {
            return $this->getPlugin()->path('database').'/seeds/'.$name.'.php';
        } else {
            return $this->getPlugin()->path('database').'/seeders/'.$name.'.php';
        }
    }
}
