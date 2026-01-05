<?php

namespace Fragments;

use Closure;
use Fragments\Context;
use Fragments\Interfaces\RouterInterface;
use Fragments\Lib\Http\Request;
use Fragments\Lib\Http\Response;
use Fragments\Router\Get;
use Fragments\Router\Router;
use Fragments\Loader;
use LogicException;

final class Dispatcher
{
    /** @var Router[] */
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch(Request $request): string
    {
        foreach ($this->routes as $route) {

            if (!$this->matches($route, $request)) {
                continue;
            }

            return $this->execute($route, $request);
        }

        return Loader::static(Response::class, 'notFound');
    }

    private function matches(RouterInterface $route, Request $request): bool
    {
        return $route->method() === $request->method()
            && $route->path() === $request->path();
    }

    private function execute(
        Get $route,
        Request $request
    ): string {
        $context = $route->context;
        $context->request = $request;

        // Boot fragments (explicit, ordered)        
        foreach ($route->fragments as
            /** @var Closure<FragmentInterface> */
            $fragment) {
            $fragment()->boot($context);
        }

        // Execute handler
        $result = ($route->handler)($context);
        return $result;
    }
}
