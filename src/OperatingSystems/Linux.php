<?php

namespace KnotsPHP\System\OperatingSystems;

use KnotsPHP\System\Contracts\OperatingSystem;

final class Linux implements OperatingSystem
{
    private ?string $cached_name = null;

    private ?string $cached_version = null;

    private ?string $cached_release = null;

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
        $this->cached_version = $ini['VERSION'] ?? '';
        $this->cached_release = $ini['VERSION_ID'] ?? '';
    }

    public function name(): string
    {
        return $this->cached_name ?? php_uname('s');
    }

    public function version(): string
    {
        return $this->cached_version ?? php_uname('v');
    }

    public function release(): string
    {
        return $this->cached_release ?? php_uname('r');
    }
}
