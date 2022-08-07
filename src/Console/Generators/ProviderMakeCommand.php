<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\ProviderMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class ProviderMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:provider';
}
