<?php

namespace KnotsPHP\System\Contracts;

interface OperatingSystemContract
{
    public function name(): string;

    public function version(): string;

    public function kernel(): string;

    public function build(): string;
}
