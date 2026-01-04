<?php

namespace Fragments\Router;

class Router
{
    public array $fragments = [];

    public function uses(...$fragments)
    {
        $this->fragments = $fragments;
        return $this;
    }
}