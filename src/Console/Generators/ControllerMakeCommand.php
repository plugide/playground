<?php

namespace Plugide\Playground\Console\Generators;

use Plugide\Playground\Console\Generator;
use Illuminate\Routing\Console\ControllerMakeCommand as Command;
use Plugide\Playground\Console\StubPath;

class ControllerMakeCommand extends Command
{
    use Generator;
    use StubPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:controller';
}
