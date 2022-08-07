<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\ObserverMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class ObserverMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:observer';
}
