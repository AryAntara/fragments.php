<?php

namespace App\Features\User;

use Fragments\Context;
use App\Features\User\UserService;
use App\Features\User\UserRepository;

class UserContext extends Context
{
    public ?UserService $service;
    public ?UserRepository $repository;
}