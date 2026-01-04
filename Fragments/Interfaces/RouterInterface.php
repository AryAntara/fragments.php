<?php 

namespace Fragments\Interfaces;

use Fragments\Enums\RouterMethod;

interface RouterInterface
{
    public function method(): RouterMethod;
    public function path(): string;
}