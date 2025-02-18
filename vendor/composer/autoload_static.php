<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaa3cad04e981fa11ec9bd7e4579cdcb8
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaa3cad04e981fa11ec9bd7e4579cdcb8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaa3cad04e981fa11ec9bd7e4579cdcb8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaa3cad04e981fa11ec9bd7e4579cdcb8::$classMap;

        }, null, ClassLoader::class);
    }
}
