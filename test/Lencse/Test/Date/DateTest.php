<?php

namespace Lencse\Test\Date;

use Lencse\Date\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{
    public function testDateCreation()
    {
        $date = new Date(2017, 3, 15);
        $this->assertEquals(2017, $date->getYear());
        $this->assertEquals(3, $date->getMonth());
        $this->assertEquals(15, $date->getDay());
    }
    public function testInvalid()
    {
        try {
            $date = new Date(2017, 2, 29);
        } catch (\InvalidArgumentException $e) {
            return;
        }
        $this->fail('Exception should be thrown');
    }
    public function testIsWeekend()
    {
        $testData = [
            [2017, 3, 27, false],
            [2017, 3, 28, false],
            [2017, 3, 29, false],
            [2017, 3, 30, false],
            [2017, 3, 31, false],
            [2017, 4, 1, true],
            [2017, 4, 2, true]
        ];
        foreach ($testData as $data) {
            $date = new Date($data[0], $data[1], $data[2]);
            $this->assertEquals($data[3], $date->isWeekend());
        }
    }
    public function testToString()
    {
        $date = new Date(2017, 3, 15);
        $this->assertEquals('20170315', (string) $date);
    }
    public function testAsDateTime()
    {
        $date = new Date(2017, 3, 18);
        $this->assertEquals(\DateTime::createFromFormat('Y-m-d', '2017-03-18'), $date->asDateTime());
    }
}
