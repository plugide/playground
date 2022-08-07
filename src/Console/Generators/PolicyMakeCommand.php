<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\PolicyMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class PolicyMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:policy';
}
