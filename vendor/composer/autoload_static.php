<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit745a002fa61313a231fa92998d08b738
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit745a002fa61313a231fa92998d08b738::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit745a002fa61313a231fa92998d08b738::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit745a002fa61313a231fa92998d08b738::$classMap;

        }, null, ClassLoader::class);
    }
}