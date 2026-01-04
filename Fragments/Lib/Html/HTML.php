<?php

namespace Fragments\Lib\Html;

use Fragments\Loader;

class HTML
{
    public $presentation_path = '/../presentations/';

    public function load(string $path, mixed $data = null): string
    {
        // Delegate to Loader to resolve and include the presentation,
        // passing $data through to the template scope.
        return Loader::fromFile($this->presentation_path . $path, $data);
    }
}