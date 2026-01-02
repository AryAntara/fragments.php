<?php
namespace Fragments\Parts;

use Fragments\Loader;

class EntityFragment implements Fragment
{
    public function __construct(
        public string $module,
    ) {
    }

    public function boot($_)
    {
        $module = ucfirst($this->module);
        Loader::fromFile("/../app/Features/{$module}/{$module}Entity");
    }
}