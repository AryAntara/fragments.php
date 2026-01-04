<?php
namespace Fragments\Parts;

use Fragments\Interfaces\FragmentInterface;
use Fragments\Loader;

class EntityFragment implements FragmentInterface
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