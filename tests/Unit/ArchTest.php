<?php

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
    ->toExtend(\KnotsPHP\System\Exceptions\Exception::class)
    ->ignoring(\KnotsPHP\System\Exceptions\Exception::class)
    ->ignoring(\KnotsPHP\System\Exceptions\InvalidArgumentException::class)
    ->ignoring(\KnotsPHP\System\Exceptions\RuntimeException::class);

arch('library.operating-system')
    ->expect('KnotsPHP\System\OperatingSystems')
    ->toImplement('KnotsPHP\System\Contracts\OperatingSystemContract')
    ->toBeFinal();

arch('debug')->preset()->php();
