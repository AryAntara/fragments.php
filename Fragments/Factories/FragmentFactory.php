<?php
namespace Fragments\Parts;

use Fragments\Interfaces\FragmentInterface;
use Closure;
use Fragments\Context;
use Fragments\Loader;

final class FragmentFactory
{
    /**     
     * @return Closure<ResponseFragment>
     */
    public static function response(): Closure
    {
        return fn() =>
            Loader::new(
                ResponseFragment::class,
            );
    }

    /**     
     * @return Closure<DatabaseFragment>
     */
    public static function database(): Closure
    {
        return fn() =>
            Loader::new(
                DatabaseFragment::class,
            );
    }

    /**
     * @return Closure<EntityFragment>
     */
    public static function entity(string $module): Closure
    {
        return fn() => Loader::new(
            EntityFragment::class,
            $module,
        );
    }

    /**
     * @param string $module
     * @return Closure<RepositoryFragment>
     */
    private static function repository(string $module): Closure
    {
        return fn() => Loader::new(
            RepositoryFragment::class,
            $module,
        );
    }

    /**     
     * @param string $module
     * @return Closure<ServiceFragment>
     */
    public static function service(string $module): Closure
    {
        // Should load repository first
        return fn() => Loader::new(
            ServiceFragment::class,
            $module,
        );
    }

    /**     
     * @return Closure<HTMLFragment>
     */
    public static function html(): Closure
    {
        return fn() => Loader::new(
            HTMLFragment::class,
        );
    }

    /**
     * Boot up all services for a modules 
     * @return array<Closure<FragmentInterface>>
     */
    public static function boot(string $module): array
    {
        return
            [
                self::entity($module),
                self::repository($module),
                self::service($module),
            ];
    }
}