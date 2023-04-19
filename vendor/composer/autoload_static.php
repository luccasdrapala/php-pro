<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb6ebdf0d87b9c069cdafe38ee0f85120
{
    public static $files = array (
        '6df6df232dfa2d8b4f63886c9d6935fd' => __DIR__ . '/../..' . '/app/helpers/constantes.php',
        '3998e96dd84346616e852b51005b8a30' => __DIR__ . '/../..' . '/app/router/router.php',
        'b73661d51333a41a40bdeda969e828e6' => __DIR__ . '/../..' . '/app/core/controller.php',
        '25874ae84cceb6efb9d5f443eb9cb34c' => __DIR__ . '/../..' . '/app/database/connection.php',
        '323db3d9c12509602da22cded1cb8c9f' => __DIR__ . '/../..' . '/app/database/fetch.php',
        '34df3ba8e2a2f4f49761a51bda0afecc' => __DIR__ . '/../..' . '/app/helpers/redirect.php',
        '28190825494d9bd9fc8189f3fe0b8a53' => __DIR__ . '/../..' . '/app/helpers/flash.php',
        '9e7737ccf228cc2cff0c79d17b69abcc' => __DIR__ . '/../..' . '/app/helpers/sessions.php',
        '7e5a268ad9da72dca22ca49f5a68ecb1' => __DIR__ . '/../..' . '/app/helpers/validate.php',
    );

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
