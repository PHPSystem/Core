<?php
declare(strict_types=1);

namespace PHPSystem\Core;

/**
 * Represents text.
 */
class StringObject extends Object
{
    public const ORDINAL = 0x10000000;
    public const ORDINAL_IGNORE_CASE = 0x20000000;

    /**
     * The value is used for character storage.
     */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * Returns a value indicating whether a specified substring occurs within this string.
     */
    public function contains(string $value, int $case = self::ORDINAL): bool
    {
        return $this->findPosition($value, $case) !== false;
    }

    private function findPosition(string $value, int $case)
    {
        if ($case === self::ORDINAL_IGNORE_CASE) {
            return mb_stripos($this->value, $value);
        }

        return mb_strpos($this->value, $value);
    }
}
