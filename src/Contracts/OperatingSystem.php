<?php

namespace KnotsPHP\System\Contracts;

interface OperatingSystem
{
    public function name(): string;

    public function version(): string;

    public function release(): string;
}
