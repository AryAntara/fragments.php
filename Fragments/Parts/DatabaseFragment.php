<?php
namespace Fragments\Parts;

use Fragments\Context;
use Fragments\Database\Database;
use Fragments\Http\Request;
use Fragments\Loader;

final class DatabaseFragment implements Fragment
{
    public function boot(Context $context): void
    {
        $pdo = new \PDO(
            'mysql:host=127.0.0.1;dbname=neomr_test;charset=utf8mb4',
            'ary',
            'aryantara',
        );

        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $context->db = Loader::new(Database::class, $pdo);
    }
}
