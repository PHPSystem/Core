<?php
declare(strict_types=1);

namespace PHPSystem\Core\Enum\Member;

class DashPunctuation implements UnicodeCategoryMember
{
    public function designation(): string
    {
        return 'Pd';
    }
}
