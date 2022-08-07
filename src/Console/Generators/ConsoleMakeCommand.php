<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\ConsoleMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class ConsoleMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:command';
}
