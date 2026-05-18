<?php

use KnotsPHP\System\Enums\OperatingSystem;

require_once __DIR__.'/../vendor/autoload.php';

// Get the command
$os = OperatingSystem::current();

echo $os->friendlyName().PHP_EOL;

echo PHP_EOL;
