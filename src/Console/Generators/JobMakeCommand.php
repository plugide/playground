<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\JobMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class JobMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:job';
}
