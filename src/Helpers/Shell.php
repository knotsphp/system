<?php

namespace KnotsPHP\System\Helpers;

use KnotsPHP\System\Exceptions\RuntimeException;

class Shell
{
    public static function exec(string $cmd): string
    {
        $result = shell_exec($cmd);

        return $result ? trim($result) : '';
    }

    public static function execOrFail(string $cmd): string
    {
        $result = shell_exec($cmd);

        if (empty($result)) {
            throw new RuntimeException("Failed to execute command: $cmd");
        }

        return trim($result);
    }
}
