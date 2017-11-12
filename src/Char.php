<?php
declare(strict_types=1);

namespace PHPSystem\Core;

use PHPSystem\Core\Exception\FormatException;

class Char extends Object
{
    /**
     * @var string
     */
    private $char;

    public function __construct(string $char)
    {
        if (mb_strlen($char) !== 1) {
            throw new FormatException("Input \"$char\" must be a single-character string");
        }

        $this->char = $char;
    }

    public function __toString(): string
    {
        return $this->char;
    }
}
