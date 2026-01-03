<?php

namespace Fragments\Http;

use Fragments\Loader;

class HTML
{
    public $presentation_path = '/../presentations/';

    public function load(string $path, mixed $data = null): string
    {        
        return Loader::fromFile($this->presentation_path . $path);
    }
}