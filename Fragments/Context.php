<?php
namespace Fragments;

use Fragments\Http\HTML;
use Fragments\Http\Request;
use Fragments\Http\Response;
use Fragments\Database\Database;

final class Context
{
    public $service, $repository;
    public ?Database $db, $session;
    public ?HTML $html;

    public ?Request $request;
    public ?Response $res;

}