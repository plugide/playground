<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\ListenerMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class ListenerMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:listener';
}
