<?php

namespace Lencse\Date;

use DateTime;

class Time
{

    /**
     * @var int
     */
    private $hour;

    /**
     * @var int
     */
    private $min;

    /**
     * @param int $hour
     * @param int $min
     */
    public function __construct($hour, $min)
    {
        if (0 > $hour || 23 < $hour || 0 > $min || 59 < $min) {
            throw new \InvalidArgumentException(sprintf('Invalid time: %d:%d.', $hour, $min));
        }
        $this->hour = $hour;
        $this->min = $min;
    }

    /**
     * @return int
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    public function __toString()
    {
        return $this->getHourStr() . $this->getMinStr();
    }

    /**
     * @return string
     */
    private function getHourStr()
    {
        return str_pad($this->hour, 2, '0', STR_PAD_LEFT);
    }

    /**
     * @return string
     */
    private function getMinStr()
    {
        return str_pad($this->min, 2, '0', STR_PAD_LEFT);
    }

    /**
     * @param Date $date
     * @return DateTime
     */
    public function withDate(Date $date)
    {
        return $date->withTime($this);
    }
}
