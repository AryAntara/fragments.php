<?php

namespace Fragments\Parts;

use App\Features\User\UserRepository;
use Fragments\Context;
use Fragments\Loader;

class RepositoryFragment implements Fragment
{
    public function __construct(
        public string $module,
    ) {
    }

    public function boot(Context $ctx)
    {
        $module = ucfirst($this->module);
        Loader::fromFile("/../app/Features/{$module}/{$module}Repository");
        $ctx->repository = new UserRepository($ctx->db);
    }
}