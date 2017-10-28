<?php
declare(strict_types=1);

namespace PHPSystem\Core\Enum\Member;

class ParagraphSeparator implements UnicodeCategoryMember
{
    public function designation(): string
    {
        return 'Zp';
    }
}
