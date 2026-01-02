<?php

namespace Fragments\Http;

use Fragments\Router\RouterMethod;

class Request
{
    public function __construct(
        public string $path,
        public RouterMethod $method
    ) {}

    public static function fromGlobals()
    {
        $request = new Request(
            $_SERVER['REQUEST_URI'],
            match ($_SERVER['REQUEST_METHOD']) {
                'GET' => RouterMethod::GET,
            }
        );

        return $request;
    }

    public function path()
    {
        return $this->path;
    }

    public function method()
    {
        return $this->method;
    }

}