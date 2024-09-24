<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc87d0520661b3b551b6fe9eeacd5ff2d
{
    public static $files = array (
        '88da68e7bfb70afa2bf9dd27bcac7a6d' => __DIR__ . '/../..' . '/Src/LaraCore/Support/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Lara\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Lara\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Src/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc87d0520661b3b551b6fe9eeacd5ff2d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc87d0520661b3b551b6fe9eeacd5ff2d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc87d0520661b3b551b6fe9eeacd5ff2d::$classMap;

        }, null, ClassLoader::class);
    }
}
