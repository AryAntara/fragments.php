<?php
namespace Fragments\Parts;

use Fragments\Context;
use Fragments\Http\Response;
use Fragments\Loader;

final class ResponseFragment implements Fragment
{
    public function boot(Context $ctx)
    {
        $ctx->res = Loader::new(Response::class);
    }
}