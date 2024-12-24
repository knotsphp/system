<?php

namespace KnotsPHP\System;

use KnotsPHP\System\Contracts\OperatingSystemContract;
use KnotsPHP\System\Enums\OperatingSystem;
use KnotsPHP\System\OperatingSystems\FreeBSD;
use KnotsPHP\System\OperatingSystems\Linux;
use KnotsPHP\System\OperatingSystems\MacOS;
use KnotsPHP\System\OperatingSystems\Windows;

class System
{
    public static function os(): OperatingSystemContract
    {
        return match (OperatingSystem::current()) {
            OperatingSystem::Windows => new Windows,
            OperatingSystem::MacOS => new MacOS,
            OperatingSystem::Linux => new Linux,
            OperatingSystem::FreeBSD => new FreeBSD,
        };
    }
}
