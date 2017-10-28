<?php
declare(strict_types=1);

namespace PHPSystem\Core\Enum;

use PHPSystem\Core\Enum\Member\UnicodeCategoryMember;

class UnicodeCategory
{
    private $char;

    public function __construct(string $char)
    {
        $this->char = $char;
    }

    public function isLike(UnicodeCategoryMember $categoryMember): bool
    {
        return (bool) preg_match(sprintf('/\p{%s}/u', $categoryMember->designation()), $this->char);
    }
}
