<?php

require_once __DIR__ . '/../Fragments/Loader.php';

use Fragments\Dispatcher;
use Fragments\Http\Request;
use Fragments\Loader;

Loader::loadFilesInDirectory('/../Fragments', [
    'Route',
    'Parts/FragmentFactory',
    'Router/Router',
    'Router/Get',
    'Dispatcher',
    'Http/Request',
    'Context',
]);

$user_routes = Loader::routes('user');
$dispatcher = new Dispatcher([
    ...$user_routes
]);

$response = $dispatcher->dispatch(
    Request::fromGlobals()
);

echo $response;
