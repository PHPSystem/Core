<?php

namespace spec\PHPSystem\Core;

use PHPSystem\Core\StringObject;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringObjectSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('This is a string.');
    }
    
    public function it_is_initializable()
    {
        $this->shouldHaveType(StringObject::class);
    }

    public function it_determines_whether_a_substring_is_found_in_a_string_when_using_ordinal_comparison()
    {
        $this->contains('This')->shouldBe(true);
    }

    public function it_determines_whether_a_substring_is_found_in_a_string_when_using_case_insensitive_ordinal_comparison()
    {
        $this->contains('this', StringObject::ORDINAL_IGNORE_CASE)->shouldBe(true);
    }

    public function it_cannot_determines_whether_a_substring_is_found_in_a_string_when_using_ordinal_comparison()
    {
        $this->contains('this')->shouldBe(false);
    }
}
