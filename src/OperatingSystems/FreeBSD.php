<?php

namespace KnotsPHP\System\OperatingSystems;

use KnotsPHP\System\Contracts\OperatingSystem;

/**
 * Warning: This class is not implemented yet.
 *
 * If anyone has a FreeBSD CI/CD pipeline, please contribute to this project.
 * Or contact me @SRWieZ on GitHub.
 */
final class FreeBSD implements OperatingSystem
{
    public function name(): string
    {
        return php_uname('s');
    }

    public function version(): string
    {
        return php_uname('v');
    }

    public function release(): string
    {
        return php_uname('r');
    }
}
