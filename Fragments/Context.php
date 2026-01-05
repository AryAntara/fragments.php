<?php
namespace Fragments;

use Fragments\Interfaces\ContextInterface;
use Fragments\Lib\Html\HTML;
use Fragments\Lib\Http\Request;
use Fragments\Lib\Http\Response;
use Fragments\Lib\Database\Database;

class Context implements ContextInterface
{
    public ?Database $db, $session;
    public ?HTML $html;

    public ?Request $request;
    public ?Response $res;

    /**
     * Guarding context from magic property
     * 
     * @param string $property
     * @throws \Exception
     * @return void
     */
    public function guard(string $property): void
    {
        if (property_exists($this, $property) === false) {
            throw new \Exception("Magic is not allowed: Context does not have {$property} property. you can extend the Context class to add it.");
        }
    }

}