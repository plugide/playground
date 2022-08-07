<?php

namespace Plugide\Playground\Console\Generators;

use Plugide\Playground\Console\Generator;
use Illuminate\Routing\Console\MiddlewareMakeCommand as Command;

class MiddlewareMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:middleware';
}
