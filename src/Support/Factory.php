<?php

namespace Plugide\Playground\Support;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Plugide\Define\Contracts\Typable;
use Illuminate\Support\Fluent;
use Plugide\Define\Plug;

/**
 * @property mixed type
 * @property mixed|string path
 * @property mixed stub
 * @property mixed name
 * @property mixed namespace
 * @method name(mixed $name)
 * @method stub(mixed $stub)
 * @method namespace(string $namespace)
 * @method path(string $path)
 * @method type(Typable $type)
 */
class Factory extends Fluent
{
    /**
     * The replacements array.
     *
     * @var array
     */
    protected array $replaces = [];

    /**
     * Generate structure replaces.
     *
     * @param string $name
     * @return $this
     */
    public function generate(string $name): Factory
    {
        $this->name = $name;
        $of =  Str::of($name)->camel()->snake();

        $this->replaces = [
            'id' => Str::uuid(),
            'version' => '1.0.0',
            'name' => (string) $of->slug(),
            'studlyName' => (string) $of->studly(),
            'namespace' => null,
            'type' => $this->type->id,
            'studlyTypes' => $this->type->namespace,
            'pluralType' => Str::plural($this->type->id)
        ];

        $this->path = $this->type->path .'/'.$of->slug();

        return $this;
    }

    /**
     * Build the resource.
     *
     * @return array
     */
    public function build(): array
    {
        if (is_dir($this->path)) {
            return ['status' => false, 'message' => 'Sorry "'.$this->name.'" '. $this->type->id.' already exist!!!'];
        }

        $stubs = Plug::stubs();

        $stub = $stubs[$this->stub ?? $this->type->stub];

        foreach ($stub['files'] as $key => $value) {
            resolve(Stub::class)
                ->path($stub['folder'].'/'.$key.'.stub')
                ->replaces($this->replaces)
                ->saveTo($this->path, $value);
        }

        foreach ($stub['copy'] ?? [] as $key => $value) {
            (new Filesystem())->copyDirectory($stub['folder'].'/'.$key, $this->path.'/'.$value);
        }

        return ['status' => true, 'message' => Str::of($this->type->id)->studly() . ' ' . $this->name . ' created successfully.',];
    }

    /**
     * Set replacements array.
     *
     * @param $replace
     * @param $value
     * @return $this
     */
    public function replace($replace, $value = null): Factory
    {
        if (is_array($replace)) {
            if ($value) {
                $this->replaces = $replace;
            } else {
                $this->replaces = array_merge($this->replaces, $replace);
            }
        } else {
            $this->replaces[$replace] = $value;
        }

        return $this;
    }
}
