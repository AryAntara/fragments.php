<?php
namespace Fragments;

use Fragments\Http\Request;
use Fragments\Http\Response;

final class Context
{

    public $db , $session, $http;

    public ?Request $request;
    public ?Response $res;

}