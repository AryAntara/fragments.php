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
    public static function response(): ResponseFragment
    {
        return
            Loader::new(
                ResponseFragment::class,
            );
    }

    public static function database(): DatabaseFragment
    {
        return
            Loader::new(
                DatabaseFragment::class,
            );
    }

    public static function entity(string $module): EntityFragment
    {
        return Loader::new(
            EntityFragment::class,
            $module,
        );
    }

    private static function repository(string $module): RepositoryFragment
    {
        return Loader::new(
            RepositoryFragment::class,
            $module,
        );
    }

    public static function service(string $module): ServiceFragment
    {
        // Should load repository first
        return Loader::new(
            ServiceFragment::class,
            $module,
        );
    }

    public static function html(): HTMLFragment
    {
        return Loader::new(
            HTMLFragment::class,
        );
    }

    /**
     * Boot up all services for a modules 
     * @return array<Fragment>
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