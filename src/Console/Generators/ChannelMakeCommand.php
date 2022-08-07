<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\ChannelMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class ChannelMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:channel';
}
