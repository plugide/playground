<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\RuleMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class RuleMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:rule';
}
