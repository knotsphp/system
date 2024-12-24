#!/usr/bin/env php
<?php

use KnotsPHP\System\System;

error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

if (! class_exists('\Composer\InstalledVersions')) {
    require __DIR__.'/../vendor/autoload.php';
}

if (class_exists('\NunoMaduro\Collision\Provider')) {
    (new \NunoMaduro\Collision\Provider)->register();
}

$ipVersion = null;

// if --help or -h is passed, show help
if (in_array('--help', $argv) || in_array('-h', $argv)) {
    echo 'Usage: system'.PHP_EOL;
    echo PHP_EOL;
    exit(0);
}

$os = System::os();

echo '> OS : '.$os->name().PHP_EOL;
echo '> Version : '.$os->version().PHP_EOL;
echo '> Kernel : '.$os->kernel().PHP_EOL;
echo '> Build : '.$os->buildVersion().PHP_EOL;
