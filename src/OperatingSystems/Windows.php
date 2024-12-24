<?php

namespace KnotsPHP\System\OperatingSystems;

use KnotsPHP\System\Contracts\OperatingSystem;
use KnotsPHP\System\Exceptions\InvalidArgumentException;
use KnotsPHP\System\Helpers\Shell;

final class Windows implements OperatingSystem
{
    private ?string $cached_name = null;

    private ?string $cached_version = null;

    private ?string $cached_build_version = null;

    private ?string $cached_kernel = null;

    private ?string $cached_edition = null;

    public function __construct()
    {
        $this->retrieveFromSwVers();
    }

    private function retrieveFromSwVers(): void
    {
        $result = Shell::exec('wmic os get Caption, Version, BuildNumber /format:list');
        // BuildNumber=22631
        // Caption=Microsoft Windows 11 Famille
        // Version=10.0.22631

        $lines = explode(PHP_EOL, $result);

        $infos = [];

        foreach ($lines as $line) {
            $parts = explode('=', $line, 2);
            $infos[trim($parts[0])] = trim($parts[1] ?? '');
        }

        $this->cached_name = 'Windows';

        if (str_contains($infos['Caption'], 'Server')) {
            // Server 2022
            $this->cached_edition = implode(' ', array_slice(explode(' ', $infos['Caption']), 2));
            $this->cached_version = $this->getWindowsVersion($infos['Version'] ?? '');
        } else {
            // Pro / Family / Home
            $this->cached_edition = preg_replace('/.+\s\d+\s(.*)/m', '$1', $infos['Caption'] ?? '');
            $this->cached_version = preg_replace('/.+\s(\d+)\s.*/m', '$1', $infos['Version'] ?? '');
        }

        $this->cached_build_version = $this->getDisplayVersion();

        $this->cached_kernel = $this->getFullVersionNumber() ?: ($infos['Version'] ?? null);
    }

    private function getFullVersionNumber(): ?string
    {
        return preg_replace('/.*\[.*\s((\d+.?)*)\]/m', '$1', Shell::exec('ver'));
    }

    /**
     * Get the 23H2 version format
     */
    private function getDisplayVersion(): ?string
    {
        // Execute the registry query
        // or  (Get-ItemProperty "HKLM:\SOFTWARE\Microsoft\Windows NT\CurrentVersion").DisplayVersion
        $output = Shell::exec('reg query "HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion" /v DisplayVersion 2>&1');

        // Use regular expression to extract the version
        if (preg_match('/DisplayVersion\s+REG_SZ\s+(\S+)/', $output, $matches)) {
            return $matches[1];
        }

        return null;
    }

    public function name(): string
    {
        return $this->cached_name ?? '';
    }

    public function version(): string
    {
        return $this->cached_version ?? '';
    }

    public function getWindowsVersion(string $versionString): ?string
    {
        // 10.0.22631 / 10.0.20348
        $versionParts = explode('.', $versionString);

        // Check if the version string is valid
        if (count($versionParts) < 2) {
            throw new InvalidArgumentException('Invalid Windows version string: '.$versionString);
        }

        // Extract major and minor version numbers
        $majorVersion = (int) $versionParts[0];
        $minorVersion = (int) $versionParts[1];

        // Determine the Windows version based on the major version
        if ($majorVersion === 6) {
            if ($minorVersion === 1) {
                return '7';
            } elseif ($minorVersion === 2) {
                return '8';
            } elseif ($minorVersion === 3) {
                return '8.1';
            }
        } elseif ($majorVersion === 10) {
            if ($minorVersion >= 0 && $minorVersion < 22000) {
                return '10';
            } elseif ($minorVersion >= 22000) {
                return '11';
            }
        }

        return null;
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

    public function kernel(): string
    {
        return $this->cached_kernel ?? '';
    }
}
