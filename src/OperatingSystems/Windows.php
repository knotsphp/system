<?php

namespace KnotsPHP\System\OperatingSystems;

use KnotsPHP\System\Contracts\OperatingSystem;
use KnotsPHP\System\Helpers\Shell;

final class Windows implements OperatingSystem
{
    private ?string $cached_name = null;

    private ?string $cached_version = null;

    private ?string $cached_release = null;

    private ?string $cached_build_version = null;

    private ?string $cached_edition = null;

    public function __construct()
    {
        $this->retrieveFromSwVers();
    }

    private function retrieveFromSwVers(): void
    {
        $result = Shell::exec('wmic os get Caption, Version, BuildNumber /format:list');

        $lines = explode(PHP_EOL, $result);

        $infos = [];

        foreach ($lines as $line) {
            $parts = explode('=', $line, 2);
            $infos[trim($parts[0])] = trim($parts[1] ?? '');
        }

        $this->cached_edition = preg_replace('/.+\s\d+\s(.*)/m', '$1', $infos['Caption'] ?? '');

        $this->cached_name = preg_replace('/(.+\s)\d+\s.*/m', '$1', $infos['Caption'] ?? '');
        $this->cached_version = preg_replace('/.+\s(\d+)\s.*/m', '$1', $infos['Caption'] ?? '');
        $this->cached_release = $infos['Version'] ?? null;
        $this->cached_build_version = $infos['BuildNumber'] ?? null;
    }

    public function name(): string
    {
        return $this->cached_name ?? '';
    }

    public function version(): string
    {
        return $this->cached_version ?? '';
    }

    public function release(): string
    {
        return $this->cached_release ?? '';
    }

    public function buildVersion(): string
    {
        return $this->cached_build_version ?? '';
    }

    public function edition(): string
    {
        return $this->cached_edition ?? '';
    }

    public function isServer(): bool
    {
        return str_contains($this->name(), 'Server');
    }
}
