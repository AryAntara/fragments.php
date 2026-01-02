<?php

namespace Fragments\Parts;

use Fragments\Loader;

class RepositoryFragment implements Fragment
{
    public function __construct(
        public string $module,
    ) {
    }

    public function boot($_)
    {
        $module = ucfirst($this->module);
        Loader::fromFile("/../app/Features/{$module}/{$module}Repository");
    }
}