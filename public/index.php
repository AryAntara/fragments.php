<?php

require_once __DIR__ . '/../Fragments/Loader.php';

use Fragments\Dispatcher;
use Fragments\Lib\Http\Request;
use Fragments\Loader;

Loader::loadFilesInDirectory('/../Fragments', [
    'Interfaces/FragmentInterface',
    'Interfaces/RouterInterface',
    'Interfaces/ContextInterface',
    'Factories/RouterFactory',
    'Factories/FragmentFactory',
    'Lib/Router/Router',
    'Lib/Router/Get',
    'Lib/Router/Post',
    'Lib/Router/Delete',
    'Lib/Router/Put',
    'Enums/RouterMethod',
    'Dispatcher',
    'Lib/Http/Request',
    'Context',
]);

$user_routes = Loader::routes('user');
$home_routes = Loader::routes('page/home');
$dispatcher = new Dispatcher([
    ...$user_routes,
    ...$home_routes,
]);

$response = $dispatcher->dispatch(
    Request::fromGlobals()
);

echo $response;
