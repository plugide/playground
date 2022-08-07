<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\RequestMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class RequestMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:request';
}
