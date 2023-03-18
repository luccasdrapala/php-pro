<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb6ebdf0d87b9c069cdafe38ee0f85120
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitb6ebdf0d87b9c069cdafe38ee0f85120', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb6ebdf0d87b9c069cdafe38ee0f85120', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb6ebdf0d87b9c069cdafe38ee0f85120::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
