<?php
declare(strict_types=1);

namespace spec\PHPSystem\Core\Enum;

use PHPSystem\Core\Enum\UnicodeCategory;
use PhpSpec\ObjectBehavior;

class UnicodeCategorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedWith('a');
        $this->shouldHaveType(UnicodeCategory::class);
    }
}
