<?php
declare(strict_types=1);

namespace PHPSystem\Core\Enum\Member;

class ModifierLetter implements UnicodeCategoryMember
{
    public function designation(): string
    {
        return 'Lm';
    }
}
