<?php
namespace Fragments\Parts;

use Fragments\Context;
use Fragments\Loader;

interface Fragment
{
    public function boot(Context $c);
}

final class FragmentFactory
{
    public static function response()
    {
        return
            Loader::new(
                ResponseFragment::class,
            );
    }

    public static function database()
    {
        return
            Loader::new(
                DatabaseFragment::class,
            );
    }

    public static function entity(string $module)
    {
        return Loader::new(
            EntityFragment::class,
            $module,
        );
    }

    public static function repository(string $module)
    {
        return Loader::new(
            RepositoryFragment::class,
            $module,
        );
    }

    public static function service(string $module)
    {
        return Loader::new(
            ServiceFragment::class,
            $module,
        );
    }

    /**
     * Boot up all services for a modules 
     */
    public static function boot(string $module)
    {
        return
            [
                self::entity($module),
                self::repository($module),
                self::service($module),
            ];
    }
}