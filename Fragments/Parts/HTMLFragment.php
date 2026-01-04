<?php

namespace Fragments\Parts;

use Fragments\Context;
use Fragments\Interfaces\FragmentInterface;
use Fragments\Loader;

class HTMLFragment implements FragmentInterface
{
    public function boot(Context $ctx)
    {
        $ctx->html = Loader::new(\Fragments\Lib\Html\HTML::class);
    }
}