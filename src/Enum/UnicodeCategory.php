<?php
declare(strict_types=1);

namespace PHPSystem\Core\Enum;

class UnicodeCategory
{
    private $char;

    public function __construct(string $char)
    {
        $this->char = $char;
    }
}
