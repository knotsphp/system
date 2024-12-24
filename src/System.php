<?php

namespace KnotsPHP\System;

use KnotsPHP\System\Contracts\OperatingSystem as OperatingSystemContract;
use KnotsPHP\System\Enums\OperatingSystem;

class System
{
    public static function os(): OperatingSystemContract
    {
        return match (OperatingSystem::current()) {
            OperatingSystem::Windows => new OperatingSystems\Windows,
            OperatingSystem::MacOS => new OperatingSystems\MacOS,
            OperatingSystem::Linux => new OperatingSystems\Linux,
            OperatingSystem::FreeBSD => new OperatingSystems\FreeBSD,
        };
    }
}
