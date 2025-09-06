<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    /**
     * Format date with ordinal suffix
     */
    public static function formatDate($date)
    {
        if (!$date) return '';
        
        $dateObj = Carbon::parse($date);
        $day = $dateObj->day;
        $month = $dateObj->format('F');
        $year = $dateObj->year;
        
        // Add ordinal suffix to day
        $dayWithSuffix = self::addOrdinalSuffix($day);
        
        return $dayWithSuffix . ' ' . $month . ' ' . $year;
    }
    
    /**
     * Add ordinal suffix to number
     */
    public static function addOrdinalSuffix($number)
    {
        if ($number >= 11 && $number <= 13) {
            return $number . 'th';
        }
        
        switch ($number % 10) {
            case 1:
                return $number . 'st';
            case 2:
                return $number . 'nd';
            case 3:
                return $number . 'rd';
            default:
                return $number . 'th';
        }
    }
}