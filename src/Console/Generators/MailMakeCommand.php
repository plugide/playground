<?php

namespace Plugide\Playground\Console\Generators;

use Illuminate\Foundation\Console\MailMakeCommand as Command;
use Plugide\Playground\Console\Generator;

class MailMakeCommand extends Command
{
    use Generator;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'plug:mail';
}
