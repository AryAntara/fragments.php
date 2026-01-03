<?php

namespace Fragments\Parts;

use App\Features\User\UserService;
use Fragments\Context;
use Fragments\Loader;

class ServiceFragment implements Fragment
{
    public function __construct(
        public string $module,
    ) {
    }

    public function boot(Context $ctx)
    {
               $modules = $this->module;
        $modules = array_map(fn($module) => ucfirst($module), explode('/', $modules));
        $module = end($modules);
        $path = '';
        if (count($modules) > 1)
            $path .= implode('/', array_slice($modules, 0, -1)) . '/';

        $path .= $module;

        $full_path = "/../app/Features/{$path}/";
        Loader::fromFile($full_path . "{$module}Service");
        $service_class = "App\\Features\\" . str_replace('/', '\\', $path) . "\\{$module}Service";        
        $ctx->service = new $service_class($ctx->repository);
    }
}