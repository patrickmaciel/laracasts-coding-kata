<?php


use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @test
     * @dataProvider checks
     */
    public function it_generates_the_roman_numeral_for_checks(
        $number,
        $numeral
    ) {
        $this->assertEquals(
            $numeral,
            RomanNumerals::generate($number)
        );
    }

    /** @test */
    public function it_cannot_generate_for_less_than_one()
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }

    /** @test */
    public function it_cannot_generate_for_more_than_3999()
    {
        $this->assertFalse(RomanNumerals::generate(4000));
    }

    public static function checks()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [11, 'XI'],
            [12, 'XII'],
            [13, 'XIII'],
            [14, 'XIV'],
            [15, 'XV'],
            [16, 'XVI'],
            [17, 'XVII'],
            [18, 'XVIII'],
            [19, 'XIX'],
            [20, 'XX'],
            [30, 'XXX'],
            [40, 'XL'],
            [41, 'XLI'],
            [50, 'L'],
            [55, 'LV'],
            [90, 'XC'],
            [93, 'XCIII'],
            [100, 'C'],
            [141, 'CXLI'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
        ];
    }
}
