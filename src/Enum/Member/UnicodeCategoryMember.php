<?php
declare(strict_types=1);

namespace PHPSystem\Core\Enum\Member;

interface UnicodeCategoryMember
{
    /**
     * Unicode category of regular expressions
     */
    public function designation(): string;
}
