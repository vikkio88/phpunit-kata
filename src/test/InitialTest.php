<?php
namespace Kata\Test;

use Kata\Initial;

class InitialTest extends \PHPUnit_Framework_TestCase
{
    public function testTrueIsTrue()
    {
        $obj = new Initial;

        $this->assertTrue($obj->isTrue());
    }
}
