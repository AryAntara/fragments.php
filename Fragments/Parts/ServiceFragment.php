<?php

namespace Fragments\Parts;

use App\Features\User\UserService;
use Fragments\Context;
use Fragments\Interfaces\ContextInterface;
use Fragments\Interfaces\FragmentInterface;
use Fragments\Loader;

class ServiceFragment implements FragmentInterface
{
    public function __construct(
        public string $module,
    ) {
    }

    public function boot(ContextInterface $ctx)
    {
        $module = $this->module;
        [$path, $module] = Loader::getModulePath($module);
        $full_path = "/../app/Features/{$path}/";
        Loader::fromFile($full_path . "{$module}Service");
        $service_class = "App\\Features\\" . str_replace('/', '\\', $path) . "\\{$module}Service";

        $ctx->guard('repository');
        $ctx->guard('service');

        $repository = $ctx->repository;  
        $ctx->service = new $service_class($repository);
    }
}