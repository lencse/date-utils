<?php

namespace Lencse\Date;

use DateTime;

class DateHelper
{

    /**
     * @var string[]
     */
    private static $regexpTOFormat = [
        '/^\d{4}-\d{2}-\d{2}$/' => 'Y-m-d',
        '/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/' => 'Y-m-d H:i:s',
    ];

    /**
     * @param string $dateString
     * @return DateTime
     */
    public static function dateTime($dateString)
    {
        foreach (self::$regexpTOFormat as $regexp => $format) {
            if (preg_match($regexp, $dateString)) {
                return DateTime::createFromFormat($format, $dateString);
            }
        }

        throw new \InvalidArgumentException(sprintf('Invalid date format: %s.', $dateString));
    }
}
