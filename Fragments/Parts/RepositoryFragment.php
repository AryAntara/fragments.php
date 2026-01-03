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
        $modules = $this->module;
        $modules = array_map(fn($module) => ucfirst($module), explode('/', $modules));
        $module = end($modules);
        $path = '';
        if (count($modules) > 1)
            $path .= implode('/', array_slice($modules, 0, -1)) . '/';

        $path .= $module;

        $full_path = "/../app/Features/{$path}/";
        $repo_file = $full_path . "{$module}Repository";
        Loader::fromFile($repo_file);

        $repository_class = "App\\Features\\" . str_replace('/', '\\', $path) . "\\{$module}Repository";        
        $ctx->repository = new $repository_class($ctx->db);
    }
}