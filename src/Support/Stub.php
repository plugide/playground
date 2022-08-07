<?php

namespace Plugide\Playground\Support;

use Illuminate\Support\Fluent;

/**
 * @property string path
 * @property array replaces
 * @method path($value = null)
 * @method replaces($value = null)
 */
class Stub extends Fluent
{
    /**
     * Get stub contents.
     *
     * @return string
     */
    public function render(): string
    {
        $contents = file_get_contents($this->path);

        foreach ($this->replaces as $search => $replace) {
            $contents = str_replace('{{ '.$search.' }}', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Save stub to specific path.
     *
     * @param string $path
     * @param string $filename
     *
     * @return bool
     */
    public function saveTo(string $path, string $filename): bool
    {
        $dir = dirname($path.'/'.$filename);

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        return file_put_contents($path.'/'.$filename, $this->render());
    }
}
