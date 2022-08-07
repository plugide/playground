<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\NotificationMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class NotificationMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:notification';
}
