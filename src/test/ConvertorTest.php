<?php
namespace Kata\Test;

use Kata\Convertor;

class ConvertorTest extends \PHPUnit_Framework_TestCase
{
    private $convertor;

    public function setUp()
    {
        $this->convertor = new Convertor;
    }

    public function testDoesNotConvertMoreThan3000()
    {
        $this->assertFalse($this->convertor->convert(3001));
    }

    public function testDoesNotConvertZeroOrBelow()
    {
        $this->assertFalse($this->convertor->convert(-1));
        $this->assertFalse($this->convertor->convert(0));
    }

    public function testCannotAcceptStrings()
    {
        $this->assertFalse($this->convertor->convert('some-string'));
    }

    /**
     * @dataProvider getExpectedNumeralValues
     */
    public function testDecimalsAreConvertedToExpectedNumerals($decimal, $expectedNumeral)
    {
        $this->assertEquals($expectedNumeral, $this->convertor->convert($decimal));
    }

    /**
     * Data Provider for testDecimalsAreConvertedToExpectedNumerals
     *
     * @return array
     */
    public function getExpectedNumeralValues()
    {
        return [
            1 => [1, 'I'],
            2 => [2, 'II'],
            3 => [3, 'III'],
            4 => [4, 'IV'],
            5 => [5, 'V'],
            6 => [6, 'VI'],
            7 => [7, 'VII'],
            9 => [9, 'IX'],
            10 => [10, 'X'],
            17 => [17, 'XVII'],
            77 => [77, 'LXXVII'],
            767 => [767, 'DCCLXVII'],
            1260 => [1260, 'MCCLX']
        ];
    }
}
