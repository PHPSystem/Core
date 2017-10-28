<?php
declare(strict_types=1);

namespace PHPSystem\Core\Enum\Member;

class ConnectorPunctuation implements UnicodeCategoryMember
{
    public function designation(): string
    {
        return 'Pc';
    }
}
