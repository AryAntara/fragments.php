<?php
namespace Fragments\Factories;

use Fragments\Router\Get;
use Fragments\Router\Post;
use Fragments\Router\Put;
use Fragments\Router\Delete;

final class RouterFactory
{
    public static function get(
        string $path,
        \Closure $handler,
    ) {
        return new Get($path, $handler);
    }

    public static function post(
        string $path,
        \Closure $handler,
    ) {
        return new Post($path, $handler);
    }

    public static function delete(
        string $path,
        \Closure $handler,
    ) {
        return new Delete($path, $handler);
    }

    public static function put(
        string $path,
        \Closure $handler,
    ) {
        return new Put($path, $handler);
    }


}