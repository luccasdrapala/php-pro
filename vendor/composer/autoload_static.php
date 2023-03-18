<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb6ebdf0d87b9c069cdafe38ee0f85120
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitb6ebdf0d87b9c069cdafe38ee0f85120::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb6ebdf0d87b9c069cdafe38ee0f85120::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb6ebdf0d87b9c069cdafe38ee0f85120::$classMap;

        }, null, ClassLoader::class);
    }
}
