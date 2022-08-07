<?php

namespace Plugide\Playground\Support;

use Illuminate\Support\Fluent;
use Illuminate\Support\Str;
use Plugide\Define\Plug;
use Plugide\Define\Plugin;

/**
 * @property mixed|null name
 * @property mixed|null type
 * @property mixed|string|null handle
 */
class Resolver extends Fluent
{
    /**
     * Make resolve
     *
     * @param $handle
     * @param null $type
     * @return static
     */
    public static function make($handle, $type = null)
    {
        $resolve = new static();

        if (Str::contains($handle, ':')) {
            [$type, $name] = Str::of($handle)->explode(':');
            $resolve->type = $type;
            $resolve->name = $name;
        } else {
            $resolve->type = $type;
            $resolve->name = $handle;
        }

        $resolve->handle = $resolve->type.':'.$resolve->name;

        return $resolve;
    }

    /**
     * Get type if exists.
     *
     * @return mixed
     */
    public function type($type = null)
    {
        return Plug::findType($type ?? $this->type);
    }

    /**
     * Get plugin if exists.
     *
     * @return mixed
     */
    public function plugin()
    {
        return Plugin::where('handle', $this->handle)->first();
    }

    /**
     * Generate a new  plugin.
     *
     * @param string|null $stub
     * @return mixed
     */
    public function generate(string $stub = null)
    {
        $name = $this->name;
        $type = $this->type();
        $factory = (new Factory())->type($type)->stub($stub ?? $this->stub);

        return $factory->generate($name)
            ->replace('namespace', $type->namespace(Str::of($name)->studly()));
    }
}
