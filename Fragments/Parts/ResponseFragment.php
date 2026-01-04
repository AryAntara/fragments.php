<?php
namespace Fragments\Parts;

use Fragments\Context;
use Fragments\Interfaces\FragmentInterface;
use Fragments\Lib\Http\Response;
use Fragments\Loader;

final class ResponseFragment implements FragmentInterface
{
    public function boot(Context $ctx)
    {
        $ctx->res = Loader::new(Response::class);
    }
}