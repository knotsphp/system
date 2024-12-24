<?php

namespace KnotsPHP\System\OperatingSystems;

use KnotsPHP\System\Contracts\OperatingSystemContract;

/**
 * Warning: This class is not implemented yet.
 *
 * If anyone has a FreeBSD CI/CD pipeline, please contribute to this project.
 * Or contact me @SRWieZ on GitHub.
 */
final class FreeBSD implements OperatingSystemContract
{
    public function name(): string
    {
        return php_uname('s');
    }

    public function version(): string
    {
        return php_uname('v');
    }

    public function kernel(): string
    {
        return php_uname('r');
    }

    public function build(): string
    {
        return php_uname('r');
    }
}
