<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\ResourceMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class ResourceMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:resource';
}
