<?php

namespace Fragments\Parts;

use Fragments\Context;
use Fragments\Loader;

class HTMLFragment implements Fragment
{
    public function boot(Context $ctx)
    {
        $ctx->html = Loader::new(\Fragments\Http\HTML::class);
    }
}