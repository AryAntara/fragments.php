<?php
namespace Fragments\Router;

use Fragments\Interfaces\RouterInterface;
use Fragments\Enums\RouterMethod;

class Post extends Router implements RouterInterface
{

    public function __construct(
        public string $path,
        public \Closure $handler,
    ) {
    }

    public function method(): RouterMethod
    {
        return RouterMethod::POST;
    }

    public function path(): string
    {
        return $this->path;
    }

}