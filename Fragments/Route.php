<?php
namespace Fragments;

use Fragments\Router\Get;

final class Route
{
    public static function get(
        string $path,
        \Closure $handler,
    ) {
        return new Get($path, $handler);

    }
}