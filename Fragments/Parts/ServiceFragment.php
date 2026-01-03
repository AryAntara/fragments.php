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
        $module = $this->module;
        [$path, $module] = Loader::getModulePath($module);
        $full_path = "/../app/Features/{$path}/";
        Loader::fromFile($full_path . "{$module}Service");
        $service_class = "App\\Features\\" . str_replace('/', '\\', $path) . "\\{$module}Service";
        $ctx->service = new $service_class($ctx->repository);
    }
}