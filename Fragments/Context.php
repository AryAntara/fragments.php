<?php
namespace Fragments;

use Fragments\Lib\Html\HTML;
use Fragments\Lib\Http\Request;
use Fragments\Lib\Http\Response;
use Fragments\Lib\Database\Database;

final class Context
{
    public $service, $repository;
    public ?Database $db, $session;
    public ?HTML $html;

    public ?Request $request;
    public ?Response $res;

}