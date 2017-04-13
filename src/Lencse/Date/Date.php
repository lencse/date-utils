<?php

namespace Lencse\Date;

use DateTime;

class Date
{

    /**
     * @var int
     */
    private $year;
    /**
     * @var int
     */
    private $month;
    /**
     * @var int
     */
    private $day;
    /**
     * @param int $year
     * @param int $month
     * @param int $day
     */
    public function __construct($year, $month, $day)
    {
        if (!checkdate($month, $day, $year)) {
            throw new \InvalidArgumentException(sprintf('Invalid date: %d.%d.%d.', $year, $month, $day));
        }
        $this->year = (int) $year;
        $this->month = (int) $month;
        $this->day = (int) $day;
    }

    /**
     * @param $str
     * @return Date
     */
    public static function fromString($str)
    {
        $year = substr($str, 0, 4);
        $month = substr($str, 4, 2);
        $day = substr($str, 6, 2);

        return new Date($year, $month, $day);
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }
    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }
    /**
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }
    /**
     * @return bool
     */
    public function isWeekend()
    {
        $dayOfWeek = (int) $this->asDateTime()->format('N');

        return 6 == $dayOfWeek || 7 == $dayOfWeek;
    }
    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    public function __toString()
    {
        return $this->asDateTime()->format('Ymd');
    }

    /**
     * @return DateTime
     */
    public function asDateTime()
    {
        return DateTime::createFromFormat('Y.n.j', implode('.', [$this->year, $this->month, $this->day]));
    }

    /**
     * @param Time $time
     * @return DateTime
     */
    public function withTime(Time $time)
    {
        return DateTime::createFromFormat('YnjHi', $this . $time);
    }
}
