<?php

namespace spec\PHPSystem\Core;

use PHPSystem\Core\Char;
use PhpSpec\ObjectBehavior;
use PHPSystem\Core\Exception\FormatException;
use Prophecy\Argument;

class CharSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedWith('a');
        $this->shouldHaveType(Char::class);
    }

    public function it_returns_the_char()
    {
        $char = 'z';

        $this->beConstructedWith($char);
        $this->__toString()->shouldBe($char);
    }

    public function it_throws_a_FormatException_when_string_is_too_long()
    {
        $this->beConstructedWith('ab');

        $this->shouldThrow(new FormatException('Input "ab" must be a single-character string'))->duringInstantiation();
    }

    public function it_throws_a_FormatException_when_string_is_too_short()
    {
        $this->beConstructedWith('');

        $this->shouldThrow(FormatException::class)->duringInstantiation();
    }
}
