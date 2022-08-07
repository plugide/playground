<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\ComponentMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class ComponentMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:component';
}
