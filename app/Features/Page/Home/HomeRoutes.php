<?php 

namespace App\Features\Page\Home;

use Fragments\Context;
use Fragments\Http\Request;
use Fragments\Parts\FragmentFactory;
use Fragments\Route;

$get_home = Route::get('/home',
    fn (Request $request, Context $ctx) =>
        $ctx->html->load('index', [
            'title' => 'Welcome to the Home Page',
            'content' => 'This is the home page of our awesome application!',
        ])
)->uses(
        FragmentFactory::html(),          
    );

return [$get_home];