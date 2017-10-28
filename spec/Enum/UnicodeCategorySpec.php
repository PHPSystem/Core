<?php
declare(strict_types=1);

namespace spec\PHPSystem\Core\Enum;

use PHPSystem\Core\Enum\Member\ClosePunctuation;
use PHPSystem\Core\Enum\UnicodeCategory;
use PhpSpec\ObjectBehavior;

class UnicodeCategorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedWith('a');
        $this->shouldHaveType(UnicodeCategory::class);
    }

    public function it_is_a_close_punctuation()
    {
        foreach ([']', ')', '}', '⟩', '｣', '⟧', '〕'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new ClosePunctuation()))->toBe(true);
        }
    }

    public function it_is_not_a_close_punctuation()
    {
        $this->beConstructedWith('>');
        $this->isLike(new ClosePunctuation())->shouldReturn(false);
    }
}
