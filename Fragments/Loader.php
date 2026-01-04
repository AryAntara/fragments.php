<?php
namespace Fragments;

use Fragments\FragmentFactory;
use LogicException;

final class Loader
{
    private static array $class_maps = [
        Lib\Html\HTML::class => __DIR__ . '/Lib/Html/HTML.php',
        Lib\Http\Response::class => __DIR__ . '/Lib/Http/Response.php',
        Lib\Http\Request::class => __DIR__ . '/Lib/Http/Request.php',
        Lib\Database\Database::class => __DIR__ . '/Lib/Database/Database.php',

        Parts\HTMLFragment::class => __DIR__ . '/Parts/HTMLFragment.php',
        Parts\ResponseFragment::class => __DIR__ . '/Parts/ResponseFragment.php',
        Parts\DatabaseFragment::class => __DIR__ . '/Parts/DatabaseFragment.php',
        Parts\EntityFragment::class => __DIR__ . '/Parts/EntityFragment.php',
        Parts\RepositoryFragment::class => __DIR__ . '/Parts/RepositoryFragment.php',
        Parts\ServiceFragment::class => __DIR__ . '/Parts/ServiceFragment.php',
    ];

    private static array $file_maps = [];
    private static array $loaded = [];

    public static function load(string $class): void
    {
        $maps = self::$class_maps;
        $file = $maps[$class]
            ?? throw new LogicException("Class not mapped: {$class}");

        file_put_contents('php://stdout', "Loading class: {$class}\n");
        if (!isset(self::$loaded[$file])) {
            require $file;
            self::$loaded[$file] = true;
        }
    }

    public static function new(string $class, mixed ...$args): object
    {        
        self::load($class);
        return new $class(...$args);
    }

    public static function static(string $class, string $method, mixed ...$args): mixed
    {
        self::load($class);
        return $class::$method(...$args);
    }

    public static function loadFiles(array $file_paths): void
    {
        foreach ($file_paths as $file_path) {
            require_once __DIR__ . $file_path . '.php';
        }
    }

    public static function loadFilesInDirectory(string $parent_directory, array $file_names): void
    {
        self::loadFiles(
            array_map(
                fn($file_name) => "{$parent_directory}/{$file_name}",
                $file_names
            )
        );
    }

    public static function fromFile(string $path, mixed $data = null): mixed
    {        
        $file = __DIR__ . $path . '.php' ?? null;        
        if (is_file($file) === false) {
            echo "FILE NOT FOUND: {$file}\n";
            throw new LogicException("File not found: {$file}");
        }
        // Include file with $data available in local scope
        return require_once $file;
    }

    public static function getModulePath(string $module): array
    {        
        $modules = array_map(fn($module) => ucfirst($module), explode('/', $module));
        $module = end($modules);
        $path = '';
        if (count($modules) > 1)
            $path .= implode('/', array_slice($modules, 0, -1)) . '/';

        $path .= $module;

        return [$path, $module];
    }

    public static function routes($module = ''): array
    {
        [$path, $module] = Loader::getModulePath($module);        

        return self::fromFile("/../app/Features/{$path}/{$module}Routes");
    }
}
