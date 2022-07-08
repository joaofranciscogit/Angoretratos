<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54e31a477b2d7b7d5fe4bc81c4b61511
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Autoload\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Autoload\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Source',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit54e31a477b2d7b7d5fe4bc81c4b61511::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54e31a477b2d7b7d5fe4bc81c4b61511::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit54e31a477b2d7b7d5fe4bc81c4b61511::$classMap;

        }, null, ClassLoader::class);
    }
}
