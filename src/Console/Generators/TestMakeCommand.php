<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\TestMakeCommand as Command;
use Illuminate\Support\Str;
use Plugide\Playground\Console\Generator;

class TestMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:test';

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->getPlugin()->path('tests/').str_replace('\\', '/', $name).'.php';
    }


    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return $this->getPlugin()->namespace('Tests');
    }
}
