<?php

namespace Lencse\Test\Date;

use DateTime;
use Lencse\Date\Date;
use Lencse\Date\Time;

class TimeTest extends \PHPUnit_Framework_Testcase
{

    public function testTimeCreation()
    {
        $time = new Time(10, 6);
        $this->assertEquals(10, $time->getHour());
        $this->assertEquals(6, $time->getMin());
    }

    public function testFromString()
    {
        $time = Time::fromString('1006');
        $this->assertEquals(10, $time->getHour());
        $this->assertEquals(6, $time->getMin());
    }

    public function testInvalid()
    {
        try {
            $time = new Time(25, 5);
        } catch (\InvalidArgumentException $e) {
            return;
        }
        $this->fail('Exception should be thrown');
    }

    public function testToString()
    {
        $time = new Time(10, 6);
        $this->assertEquals('1006', (string) $time);
    }

    public function testWithTime()
    {
        $time = new Time(10, 5);
        $date = new Date(2017, 3, 15);
        $this->assertEquals(DateTime::createFromFormat('Y-m-d H:i:s', '2017-03-15 10:05:00'), $time->withDate($date));
    }
}
