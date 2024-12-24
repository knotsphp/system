<?php

namespace KnotsPHP\System\Contracts;

interface OperatingSystem
{
    public function name(): string;

    public function version(): string;

    public function kernel(): string;

    public function buildVersion(): string;
}
