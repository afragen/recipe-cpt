<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6a63a62279bec8ed97bdb09e578104b4
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Fragen\\Recipe\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Fragen\\Recipe\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6a63a62279bec8ed97bdb09e578104b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6a63a62279bec8ed97bdb09e578104b4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}