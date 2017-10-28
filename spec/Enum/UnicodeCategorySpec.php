<?php
declare(strict_types=1);

namespace spec\PHPSystem\Core\Enum;

use PHPSystem\Core\Enum\Member\ClosePunctuation;
use PHPSystem\Core\Enum\Member\ConnectorPunctuation;
use PHPSystem\Core\Enum\Member\Control;
use PHPSystem\Core\Enum\Member\CurrencySymbol;
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

    public function it_is_a_connector_punctuation()
    {
        foreach (['_', '‿', '⁀', '⁔', '︳', '︴', '﹍', '﹎', '﹏', '＿'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new ConnectorPunctuation()))->toBe(true);
        }
    }

    public function it_is_not_a_connector_punctuation()
    {
        $this->beConstructedWith('-');
        $this->isLike(new ConnectorPunctuation())->shouldReturn(false);
    }

    public function it_is_a_control()
    {
        foreach (['	', PHP_EOL, "\u{0000}", "\u{0099}", "\u{009F}"] as $char) {
            expect((new UnicodeCategory($char))->isLike(new Control()))->toBe(true);
        }
    }

    public function it_is_not_a_control()
    {
        $this->beConstructedWith("\u{00A0}");
        $this->isLike(new Control())->shouldReturn(false);
    }

    public function it_is_a_currency_symbol()
    {
        foreach (['$', '£', '￡', '€', '₯', '₻', '＄', '฿', '﷼', '￦'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new CurrencySymbol()))->toBe(true);
        }
    }

    public function it_is_not_a_currency_symbol()
    {
        $this->beConstructedWith('￨');
        $this->isLike(new CurrencySymbol())->shouldReturn(false);
    }
}
