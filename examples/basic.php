<?php

require_once __DIR__.'/../vendor/autoload.php';

// Get the command
$os = \KnotsPHP\System\Enums\OperatingSystem::current();

echo $os->friendlyName().PHP_EOL;

echo PHP_EOL;
