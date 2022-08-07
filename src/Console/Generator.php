<?php

namespace Plugide\Playground\Console;

use Illuminate\Support\Str;
use Plugide\Define\Plugin;
use Symfony\Component\Console\Input\InputOption;

trait Generator
{
    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->getPlugin()->path(str_replace('\\', '/', 'src\\'.$name).'.php');
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return $this->getPlugin()->namespace()."\\";
    }

    /**
     * Get the element library.
     *
     * @return Plugin
     */
    protected function getPlugin()
    {
        return  Plugin::where('handle', $this->option('plug'))->first();
    }

    /**
     * Get the first view directory path from the application configuration.
     *
     * @param  string  $path
     * @return string
     */
    protected function viewPath($path = '')
    {
        $views = $this->getPlugin()->path('resource/views');

        return $views.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array_merge(
            is_callable('parent::getOptions') ? parent::getOptions() : [],
            [['plug', null, InputOption::VALUE_OPTIONAL, 'Plugin handle.']]
        );
    }
}
