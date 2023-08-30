<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb721227e9f12f1ef6a00bd9769a51bd7
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb721227e9f12f1ef6a00bd9769a51bd7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb721227e9f12f1ef6a00bd9769a51bd7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb721227e9f12f1ef6a00bd9769a51bd7::$classMap;

        }, null, ClassLoader::class);
    }
}