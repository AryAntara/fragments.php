<?php

namespace App\Features;

use App\Features\User\UserContext;
use App\Features\User\UserEntity;
use App\Features\User\UserService;
use Fragments\Context;
use Fragments\Lib\Http\Request;
use Fragments\Parts\FragmentFactory;
use Fragments\Factories\RouterFactory;

$get_user = RouterFactory::get(
    '/user',
    function (UserContext $ctx) {
        $service = $ctx?->service;
        $user_entry = $service->getUserById(1);
        return $ctx->res->json((array) $user_entry);
    }
)
    ->useCtx(UserContext::class)
    ->uses(
        FragmentFactory::response(),
        FragmentFactory::database(),
        ...FragmentFactory::boot('user')
    );

return [$get_user];

