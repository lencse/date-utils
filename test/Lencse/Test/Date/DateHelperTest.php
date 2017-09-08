<?php

namespace Lencse\Test\Date;

use DateTime;
use Lencse\Date\DateHelper;

class DateHelperTest extends \PHPUnit_Framework_TestCase
{

    public function testDateTime()
    {
        $this->assertEquals(
            DateTime::createFromFormat('Y-m-d', '2017-03-15'),
            DateHelper::dateTime('2017-03-15')
        );
        $this->assertEquals(
            DateTime::createFromFormat('Y-m-d H:i:s', '2017-03-15 10:15:00'),
            DateHelper::dateTime('2017-03-15 10:15:00')
        );
    }

    public function testInvalid()
    {
        try {
            DateHelper::dateTime('2017-03-15 10-15-00');
        } catch (\InvalidArgumentException $e) {
            return;
        }
        
        $this->fail('Exception should be thrown');
    }
}
