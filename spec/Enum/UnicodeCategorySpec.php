<?php
declare(strict_types=1);

namespace spec\PHPSystem\Core\Enum;

use PHPSystem\Core\Enum\Member\ClosePunctuation;
use PHPSystem\Core\Enum\Member\ConnectorPunctuation;
use PHPSystem\Core\Enum\Member\Control;
use PHPSystem\Core\Enum\Member\CurrencySymbol;
use PHPSystem\Core\Enum\Member\DashPunctuation;
use PHPSystem\Core\Enum\Member\DecimalDigitNumber;
use PHPSystem\Core\Enum\Member\EnclosingMark;
use PHPSystem\Core\Enum\Member\FinalQuotePunctuation;
use PHPSystem\Core\Enum\Member\Format;
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

    public function it_is_a_dash_punctuation()
    {
        foreach (['-', '᐀', '‒', '⸗', '⸚', '⸻', '゠', '︱', '－'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new DashPunctuation()))->toBe(true);
        }
    }

    public function it_is_not_a_dash_punctuation()
    {
        $this->beConstructedWith('|');
        $this->isLike(new DashPunctuation())->shouldReturn(false);
    }

    public function it_is_a_decimal_digit_number()
    {
        foreach (['0', '9', '𝟘', '𝟡', '𝟢', '𝟫', '𝟬', '𝟵', '𝟶', '𝟿', '꧐', '꧙', '꘠', '꘩', '༠', '༩'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new DecimalDigitNumber()))->toBe(true);
        }
    }

    public function it_is_not_a_decimal_digit_number()
    {
        $this->beConstructedWith('O');
        $this->isLike(new DecimalDigitNumber())->shouldReturn(false);
    }

    public function it_is_an_enclosing_mark()
    {
        foreach (['҈', '҉', '⃝', '⃞', '⃟', '⃠', '⃢', '⃣', '⃤', '꙰', '꙱', '꙲', '᪾'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new EnclosingMark()))->toBe(true);
        }
    }

    public function it_is_not_an_enclosing_mark()
    {
        $this->beConstructedWith('⸗');
        $this->isLike(new EnclosingMark())->shouldReturn(false);
    }

    public function it_is_a_final_quote_punctuation()
    {
        foreach (['»', '’', '”', '›', '⸃', '⸅', '⸊', '⸍', '⸝', '⸡'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new FinalQuotePunctuation()))->toBe(true);
        }
    }

    public function it_is_not_a_final_quote_punctuation()
    {
        $this->beConstructedWith('"');
        $this->isLike(new FinalQuotePunctuation())->shouldReturn(false);
    }

    public function it_is_a_format()
    {
        foreach (['؀', '۝', "\u{00AD}", "\u{E007F}"] as $char) {
            expect((new UnicodeCategory($char))->isLike(new Format()))->toBe(true);
        }
    }

    public function it_is_not_a_format()
    {
        $this->beConstructedWith('࣢');
        $this->isLike(new Format())->shouldReturn(false);
    }
}
