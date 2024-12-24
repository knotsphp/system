<?php

namespace KnotsPHP\System\OperatingSystems;

use KnotsPHP\System\Contracts\OperatingSystemContract;

final class Linux implements OperatingSystemContract
{
    private ?string $cached_name = null;

    private ?string $cached_version = null;

    public function __construct()
    {
        $this->retrieveFromEtcOsRelease();
    }

    private function retrieveFromEtcOsRelease(): void
    {
        $filename = '/etc/os-release';

        if (! file_exists($filename) || ! is_readable($filename)) {
            return;
        }

        $ini = parse_ini_file($filename);

        if (empty($ini)) {
            return;
        }

        /** @var string[] $ini */
        $this->cached_name = $ini['NAME'] ?? '';
        $this->cached_version = preg_replace('/^((\d.?)*)\s.*/m', '$1', $ini['VERSION'] ?? '');
    }

    public function name(): string
    {
        return $this->cached_name ?? php_uname('s');
    }

    public function version(): string
    {
        return $this->cached_version ?? php_uname('v');
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
