<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit99dfa68936b19d1cd7f0b2f69aa3d4ab
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit99dfa68936b19d1cd7f0b2f69aa3d4ab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit99dfa68936b19d1cd7f0b2f69aa3d4ab::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit99dfa68936b19d1cd7f0b2f69aa3d4ab::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
