<?php
namespace  App\Helpers ;

use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DateHelper
{
    public function __construct(Carbon $carbon )
    {
        $this->carbon =  $carbon ;
    }

    public function makeDate($date) : Carbon
    {
        return $this->carbon->createFromDate($date) ;
    }

    public  function getDaysDiff($day1, $day2, $format= null) : int
    {
        $diffInDays = is_null($format) ?
                $this->makeDate($day1)->diffInDays($this->makeDate($day2)) :
                $this->makeDate($day1)->{'diffIn'.$format}($this->makeDate($day2)) ;
        return $diffInDays;
    }

    public function getWeekDiff($day1, $day2, $format = null) : int
    {
        $diffInDays = is_null($format) ?
            $this->makeDate($day1)->diffInDays($this->makeDate($day2))/7 :
            $this->makeDate($day1)->{'diffIn'.$format}($this->makeDate($day2)) ;
        return $diffInDays;
    }
    public function convertDate($day1, $day2, $format= null) : int
    {
        is_null($format) ?
            $diffInDays = $this->makeDate($day1)->diffInDays($this->makeDate($day2)) :
            $this->makeDate($day1)->{'diffIn'.$format}($this->makeDate($day2)) ;
        return $diffInDays ;
    }

    public function getWeeksDays($date1, $date2, $format= null) : int
    {
        /**
         * week end name as per business needed
         */
        $this->carbon->setWeekendDays([
            Carbon::FRIDAY,
            Carbon::SATURDAY,
            // Carbon::SUNDAY,
        ]);

        $weekDays  = is_null($format) ?
            $this->makeDate($date1)->diffInWeekdays($this->makeDate($date2)) :
            $this->makeDate($date1)->{'diffIn'.$format}($this->makeDate($date1)
                ->addDays(($this->makeDate($date1)->diffInWeekdays($this->makeDate($date2)) )  ) ) ;
        return $weekDays ;

    }

    public function timeZoneComparasion($timeZone1, $timeZone2, $time, $format= null) : int
    {
        // $diffInTime = $this->carbon->crete($time,$timeZone1)->{'diffIn'.$format}($this->carbon->crete($time,$timeZone2 )) ;
        // dd($this->makeDate($time,$timeZone1), $this->makeDate($time,$timeZone2));
        // dd($this->carbon->create($time,$timeZone1));
        $diffInDays = is_null($format) ?
            $this->carbon->create($time,$timeZone1)->diffInHours($this->carbon->create($time,$timeZone2)) :
            $this->carbon->create($time,$timeZone1)->{'diffIn'.$format}($this->carbon->create($time,$timeZone2)) ;
        return $diffInDays ;
    }
}
