<?php 
namespace Fragments\Interfaces;

use Fragments\Context;

interface FragmentInterface
{
    public function boot(Context $c);
}
