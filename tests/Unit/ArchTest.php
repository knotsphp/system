<?php

use KnotsPHP\System\Exceptions\Exception;
use KnotsPHP\System\Exceptions\InvalidArgumentException;
use KnotsPHP\System\Exceptions\RuntimeException;

arch('enums')
    ->expect('KnotsPHP\System\Enums')
    ->toBeEnums();

arch('traits')
    ->expect('KnotsPHP\System\Traits')
    ->toBeTraits();

arch('contracts')
    ->expect('KnotsPHP\System\Contracts')
    ->toBeInterfaces();

arch('exceptions')
    ->expect('KnotsPHP\System\Exceptions')
    ->toExtend(Exception::class)
    ->ignoring(Exception::class)
    ->ignoring(InvalidArgumentException::class)
    ->ignoring(RuntimeException::class);

arch('library.operating-system')
    ->expect('KnotsPHP\System\OperatingSystems')
    ->toImplement('KnotsPHP\System\Contracts\OperatingSystemContract')
    ->toBeFinal();

arch('debug')->preset()->php();
