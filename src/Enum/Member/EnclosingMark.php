<?php
declare(strict_types=1);

namespace PHPSystem\Core\Enum\Member;

class EnclosingMark implements UnicodeCategoryMember
{
    public function designation(): string
    {
        return 'Me';
    }
}
