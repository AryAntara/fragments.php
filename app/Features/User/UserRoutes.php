<?php

namespace App\Features;

use App\Features\User\UserEntity;
use Fragments\Context;
use Fragments\Http\Request;
use Fragments\Parts\FragmentFactory;
use Fragments\Route;

$get_user = Route::get('/user',
    fn (Request $request, Context $ctx) =>
        (array) new UserEntity(
            id: 1,
            name: 'John Doe',
            email: 'john.doe@example.com'
        ) |> $ctx->res->json( ...)
)->uses(
        FragmentFactory::response(),        
        FragmentFactory::entity('user')
    );

return [$get_user];

