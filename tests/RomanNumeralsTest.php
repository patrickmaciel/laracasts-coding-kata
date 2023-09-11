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

    public static function checks()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III']
        ];
    }
}
