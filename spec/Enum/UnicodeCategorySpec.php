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
use PHPSystem\Core\Enum\Member\InitialQuotePunctuation;
use PHPSystem\Core\Enum\Member\LetterNumber;
use PHPSystem\Core\Enum\Member\LineSeparator;
use PHPSystem\Core\Enum\Member\LowercaseLetter;
use PHPSystem\Core\Enum\Member\MathSymbol;
use PHPSystem\Core\Enum\Member\ModifierLetter;
use PHPSystem\Core\Enum\Member\ModifierSymbol;
use PHPSystem\Core\Enum\Member\NonSpacingMark;
use PHPSystem\Core\Enum\Member\OpenPunctuation;
use PHPSystem\Core\Enum\Member\OtherLetter;
use PHPSystem\Core\Enum\Member\OtherNumber;
use PHPSystem\Core\Enum\Member\OtherPunctuation;
use PHPSystem\Core\Enum\Member\OtherSymbol;
use PHPSystem\Core\Enum\Member\ParagraphSeparator;
use PHPSystem\Core\Enum\Member\PrivateUse;
use PHPSystem\Core\Enum\Member\SpaceSeparator;
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

    public function it_is_an_initial_quote_punctuation()
    {
        foreach (['«', '‘', '‛', '“', '‟', '‹', '⸂', '⸄', '⸉', '⸌', '⸜', '⸠'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new InitialQuotePunctuation()))->toBe(true);
        }
    }

    public function it_is_not_an_initial_quote_punctuation()
    {
        $this->beConstructedWith('"');
        $this->isLike(new InitialQuotePunctuation())->shouldReturn(false);
    }

    public function it_is_a_letter_number()
    {
        foreach (['ᛮ', 'Ⅰ', 'Ⅻ', 'Ⅿ', '𒑮', '𒐱', '𒐫'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new LetterNumber()))->toBe(true);
        }
    }

    public function it_is_not_a_letter_number()
    {
        $this->beConstructedWith('M');
        $this->isLike(new LetterNumber())->shouldReturn(false);
    }

    public function it_is_a_line_separator()
    {
        $this->beConstructedWith("\u{2028}");
        $this->isLike(new LineSeparator())->shouldReturn(true);
    }

    public function it_is_not_a_line_separator()
    {
        $this->beConstructedWith(PHP_EOL);
        $this->isLike(new LineSeparator())->shouldReturn(false);
    }

    public function it_is_a_lowercase_letter()
    {
        foreach (['a', 'z', 'µ', 'ß', 'ϣ', 'ȱ', 'ƕ', 'œ', 'ê', 'ｚ',] as $char) {
            expect((new UnicodeCategory($char))->isLike(new LowercaseLetter()))->toBe(true);
        }
    }

    public function it_is_not_a_lowercase_letter()
    {
        $this->beConstructedWith('A');
        $this->isLike(new LowercaseLetter())->shouldReturn(false);
    }

    public function it_is_a_math_symbol()
    {
        foreach (['+', '𝟃', '=', '±', '×', '⅀', '∑', '∭', '≧', '⋙', '◁', '⟙', '⨊'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new MathSymbol()))->toBe(true);
        }
    }

    public function it_is_not_a_math_symbol()
    {
        $this->beConstructedWith('ß');
        $this->isLike(new MathSymbol())->shouldReturn(false);
    }

    public function it_is_a_modifier_letter()
    {
        foreach (['ʰ', 'ﾟ', 'ꜝ', 'ꜛ', 'ꜜ', 'ꘌ', '々', 'ᶴ', 'ヾ'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new ModifierLetter()))->toBe(true);
        }
    }

    public function it_is_not_a_modifier_letter()
    {
        $this->beConstructedWith('𖿡');
        $this->isLike(new ModifierLetter())->shouldReturn(false);
    }

    public function it_is_a_modifier_symbol()
    {
        foreach (['^', '꞊', '˜', '˂', '˃', '˘', '˟', '˩'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new ModifierSymbol()))->toBe(true);
        }
    }

    public function it_is_not_a_modifier_symbol()
    {
        $this->beConstructedWith('🏿');
        $this->isLike(new ModifierSymbol())->shouldReturn(false);
    }

    public function it_is_a_non_spacing_mark()
    {
        foreach (['̀', "\u{E01EF}", '𝆋', '𝅩', '𑀸', '𐨁', 'ꙴ', '゙'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new NonSpacingMark()))->toBe(true);
        }
    }

    public function it_is_not_a_non_spacing_mark()
    {
        $this->beConstructedWith("\u{E01F0}");
        $this->isLike(new NonSpacingMark())->shouldReturn(false);
    }

    public function it_is_an_open_punctuation()
    {
        foreach (['(', '｢', '《', '⦕', '❰', '༺'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new OpenPunctuation()))->toBe(true);
        }
    }

    public function it_is_not_an_open_punctuation()
    {
        $this->beConstructedWith('"');
        $this->isLike(new OpenPunctuation())->shouldReturn(false);
    }

    public function it_is_an_other_letter()
    {
        foreach (['ª', '鼖', '𒈰', '𒈜', 'ꁇ', 'ㇱ', 'ㆊ', 'ㅢ', 'ㄨ', 'ゾ', 'の'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new OtherLetter()))->toBe(true);
        }
    }

    public function it_is_not_an_other_letter()
    {
        $this->beConstructedWith('🏿');
        $this->isLike(new OtherLetter())->shouldReturn(false);
    }

    public function it_is_an_other_number()
    {
        foreach (['²', '🄌', '㈠', '𑁚', '𐭘', '㊷', '➊', '➉', '⒈', '⒑'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new OtherNumber()))->toBe(true);
        }
    }

    public function it_is_not_an_other_number()
    {
        $this->beConstructedWith('1');
        $this->isLike(new OtherNumber())->shouldReturn(false);
    }

    public function it_is_an_other_punctuation()
    {
        foreach (['!', '𒑴', '𑁍', '@', '＠', '／', '%', '&', '︖', '〽', '⸿', '⸘', '⁐'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new OtherPunctuation()))->toBe(true);
        }
    }

    public function it_is_not_an_other_punctuation()
    {
        $this->beConstructedWith('ㄨ');
        $this->isLike(new OtherPunctuation())->shouldReturn(false);
    }

    public function it_is_an_other_symbol()
    {
        foreach (['¦', '￼', '🉄', '🆐', '🆏', '⻘', '⺠'] as $char) {
            expect((new UnicodeCategory($char))->isLike(new OtherSymbol()))->toBe(true);
        }
    }

    public function it_is_not_an_other_symbol()
    {
        $this->beConstructedWith('🧀');
        $this->isLike(new OtherSymbol())->shouldReturn(false);
    }

    public function it_is_a_paragraph_symbol()
    {
        $this->beConstructedWith("\u{2029}");
        $this->isLike(new ParagraphSeparator())->shouldReturn(true);
    }

    public function it_is_not_a_paragraph_symbol()
    {
        $this->beConstructedWith(PHP_EOL);
        $this->isLike(new ParagraphSeparator())->shouldReturn(false);
    }

    public function it_is_a_private_use()
    {
        foreach (["\u{E000}", "\u{F8FF}", "\u{F0000}", "\u{FFFFD}", "\u{100000}", "\u{10FFFD}"] as $char) {
            expect((new UnicodeCategory($char))->isLike(new PrivateUse()))->toBe(true);
        }
    }

    public function it_is_not_a_private_use()
    {
        $this->beConstructedWith("\u{10FFFF}");
        $this->isLike(new PrivateUse())->shouldReturn(false);
    }

    public function it_is_a_space_separator()
    {
        foreach (["\u{0020}", "\u{2000}", "\u{200A}", "\u{202F}", "\u{205F}", "\u{3000}"] as $char) {
            expect((new UnicodeCategory($char))->isLike(new SpaceSeparator()))->toBe(true);
        }
    }

    public function it_is_not_a_space_separator()
    {
        $this->beConstructedWith("\u{203F}");
        $this->isLike(new SpaceSeparator())->shouldReturn(false);
    }
}
