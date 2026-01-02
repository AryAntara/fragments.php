<?php
namespace Fragments\Router;

use Fragments\Loader;

class Get implements Router
{
    use BaseRouter;

    public function __construct(
        public string $path,
        public \Closure $handler,
    ) {
    }

    public function method(): RouterMethod
    {
        return RouterMethod::GET;
    }

    public function path(): string
    {
        return $this->path;
    }

}