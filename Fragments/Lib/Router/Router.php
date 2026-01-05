<?php

namespace Fragments\Router;

use Fragments\Loader;

class Router
{
    public array $fragments = [];

    public function uses(...$fragments)
    {
        $this->fragments = $fragments;
        return $this;
    }

    public function useCtx($class)
    {
        file_put_contents('php://stdout', "Using Context: " . $class . PHP_EOL);
        Loader::fromFile('/../' . lcfirst(str_replace('\\', '/', $class)));
        $this->context = new $class();
        return $this;
    }
}