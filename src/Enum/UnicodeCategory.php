<?php
declare(strict_types=1);

namespace PHPSystem\Core\Enum;

use PHPSystem\Core\Char;
use PHPSystem\Core\Enum\Member\UnicodeCategoryMember;

class UnicodeCategory
{
    /**
     * @var Char
     */
    private $char;

    public function __construct(Char $char)
    {
        $this->char = $char;
    }

    public static function fromString(string $char): self
    {
        return new self(new Char($char));
    }

    public function isLike(UnicodeCategoryMember $categoryMember): bool
    {
        return (bool) preg_match(sprintf('/\p{%s}/u', $categoryMember->designation()), (string) $this->char);
    }
}
