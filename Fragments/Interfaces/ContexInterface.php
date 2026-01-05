<?php

namespace Fragments\Interfaces;

interface ContextInterface
{
    public function guard(string $property): void;
}