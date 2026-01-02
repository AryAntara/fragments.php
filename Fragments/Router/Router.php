<?php

namespace Fragments\Router;

enum RouterMethod
{
    case GET;
    case POST;
}

interface Router
{
    public function method(): RouterMethod;
    public function path(): string;
}

trait BaseRouter
{
    public array $fragments = [];

    public function uses(...$fragments)
    {
        $this->fragments = $fragments;        
        return $this;
    }
}