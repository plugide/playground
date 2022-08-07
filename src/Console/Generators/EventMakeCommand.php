<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\EventMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class EventMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:event';
}
