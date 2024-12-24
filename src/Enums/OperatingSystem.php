<?php

namespace KnotsPHP\System\Enums;

use KnotsPHP\System\Exceptions\InvalidArgumentException;

enum OperatingSystem: string
{
    case Windows = 'Windows';
    case MacOS = 'Darwin';
    case Linux = 'Linux';
    case FreeBSD = 'FreeBSD';

    public static function current(): self
    {
        return self::fromPHP(PHP_OS_FAMILY);
    }

    public static function fromPHP(string $os): self
    {
        return match ($os) {
            'Windows' => self::Windows,
            'Darwin' => self::MacOS,
            'Linux' => self::Linux,
            'FreeBSD' => self::FreeBSD,
            default => throw new InvalidArgumentException('Unsupported operating system: '.$os),
        };
    }

    public function friendlyName(): string
    {
        return match ($this) {
            self::Windows => 'Windows',
            self::MacOS => 'MacOS',
            self::Linux => 'Linux',
            self::FreeBSD => 'FreeBSD',
        };
    }
}
