<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0f54dc81a4b2aa0f7681e0eefee5e1e9
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Routes\\' => 7,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Routes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/routes',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0f54dc81a4b2aa0f7681e0eefee5e1e9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0f54dc81a4b2aa0f7681e0eefee5e1e9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0f54dc81a4b2aa0f7681e0eefee5e1e9::$classMap;

        }, null, ClassLoader::class);
    }
}
