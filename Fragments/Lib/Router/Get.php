<?php
namespace Fragments\Router;

use Fragments\Context;
use Fragments\Enums\RouterMethod;
use Fragments\Interfaces\RouterInterface;
use Fragments\Loader;

class Get extends Router implements RouterInterface
{
    public Context $context;
    public function __construct(
        public string $path,
        public \Closure $handler,
    ) {
        $this->context = new Context();
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