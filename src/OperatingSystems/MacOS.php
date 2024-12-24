<?php

namespace KnotsPHP\System\OperatingSystems;

use KnotsPHP\System\Contracts\OperatingSystem;
use KnotsPHP\System\Helpers\Shell;

final class MacOS implements OperatingSystem
{
    private ?string $cached_name = null;

    private ?string $cached_version = null;

    private ?string $cached_build_version = null;

    public function __construct()
    {
        $this->retrieveFromSwVers();
    }

    private function retrieveFromSwVers(): void
    {
        $result = Shell::exec('sw_vers');

        $lines = explode(PHP_EOL, $result);

        $infos = [];

        foreach ($lines as $line) {
            $parts = explode(':', $line);
            $infos[trim($parts[0])] = trim($parts[1] ?? '');
        }

        $this->cached_name = $infos['ProductName'] ?? null;
        $this->cached_version = $infos['ProductVersion'] ?? null;
        $this->cached_build_version = $infos['BuildVersion'] ?? null;
    }

    public function name(): string
    {
        return $this->cached_name ?? Shell::execOrFail('sw_vers --productName');
    }

    public function version(): string
    {
        return $this->cached_version ?? Shell::execOrFail('sw_vers --productVersion');
    }

    public function release(): string
    {
        return php_uname('r');
    }

    public function buildVersion(): string
    {
        return $this->cached_build_version ?? Shell::execOrFail('sw_vers --buildVersion');
    }
}
