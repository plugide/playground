<?php

namespace Plugide\Playground\Console;

trait StubPath
{
    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = str_replace("stubs", "stubs/plug", $this->laravel->basePath(trim($stub, '/'))))
            ? $customPath
            : __DIR__.$stub;
    }
}
