<?php

namespace App\Features;

use App\Features\User\UserEntity;
use App\Features\User\UserServices;
use Fragments\Context;
use Fragments\Http\Request;
use Fragments\Parts\FragmentFactory;
use Fragments\Route;

$get_user = Route::get('/user',
    function (Request $request, Context $ctx) {

        /** @var UserServices $service */
        $service = $ctx?->services; 

        $user_entry = $service->getUserById(1);        
        return $ctx->res->json((array)$user_entry);
    }
)->uses(
        FragmentFactory::response(),  
        FragmentFactory::database(),
        ...FragmentFactory::boot('user')
    );

return [$get_user];

