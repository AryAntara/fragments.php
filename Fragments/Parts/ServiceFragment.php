<?php

namespace Fragments\Parts;

use App\Features\User\UserServices;
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
        $module = ucfirst($this->module);
        Loader::fromFile("/../app/Features/{$module}/{$module}Service");
        $ctx->services = new UserServices($ctx->repository);
    }
}