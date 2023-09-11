<?php

namespace App;

class RomanNumerals
{
    public static function generate($number)
    {
        $result = '';

        while ($number > 0) {
            $result .= 'I';

            $number -= 1;
        }

        return $result;
    }
}
