<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class DateHelper
{
    /**
     * Convert a local dateTime to UTC DateTime
     *
     * @param $localTZ string DateTime to convert (ex: Europe/Paris)
     * @param $date string DateTime to convert (format: Y-m-d H:i:s)
     *
     * @return string
     */
    public static function convertLocalToUTC(string $localTZ, string $date)
    {
        return Carbon::parse($date, $localTZ)->setTimezone('UTC')->format('Y-m-d H:i:s');
    }
}
