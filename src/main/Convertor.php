<?php

namespace Kata;

class Convertor
{
    const LOWER_BOUND = 1;
    const UPPER_BOUND = 3000;

    private $thresholds = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    ];

    public function convert($number)
    {
        if (!$this->isValidNumber($number)) {
            return false;
        }

        return $this->toNumeral($number);
    }

    private function isValidNumber($number)
    {
        return is_numeric($number) &&
            ($number >= self::LOWER_BOUND && $number <= self::UPPER_BOUND);
    }

    private function toNumeral($number)
    {
        $numeralString = '';

        while ($number > 0) {
            foreach ($this->thresholds as $limit => $numeral) {
                if ($number >= $limit) {
                    $number -= $limit;
                    $numeralString .= $numeral;
                    break;
                }
            }
        }

        return strtoupper($numeralString);
    }
}
