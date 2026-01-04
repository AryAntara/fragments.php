<?php
namespace Fragments\Router;

use Fragments\Enums\RouterMethod;
use Fragments\Interfaces\RouterInterface;
use Fragments\Loader;

class Get extends Router implements RouterInterface
{

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