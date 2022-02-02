<?php
namespace  App\Helpers ;

use Carbon\Carbon;

class DateHelper
{
    public function __construct()
    {
        $this->carbon = new Carbon() ;
    }

    public function makeDate($date) : Carbon
    {
        return $this->carbon->createFromDate($date) ;
    }

    public  function getDaysDiff($day1, $day2, $format)
    {
        $diffInDays = $this->makeDate($day1)->diffInDays($this->makeDate($day2)) ;
        return $diffInDays;
    }

    // public function getWeekDiff($day1, $day2) : int
    // {
    //     $diffInDays = $this->makeDate($day1)->diffInDays($this->makeDate($day2)) /7 ;
    //     return $diffInDays;
    // }
    public function getWeekDiff($day1, $day2) : int
    {
        $diffInDays = $this->makeDate($day1)->diffInDays($this->makeDate($day2)) /7 ;
        return $diffInDays;
    }
    public function convertDate($day1, $day2, $format= null)
    {
        // $diffIn{$format} = 'diffIn'.$format;

        $diffInDays = $this->makeDate($day1)->{'diffIn'.$format}($this->makeDate($day2)) ;

        // dd($diffInDays);
        // dd($diffIn{$format});
        is_null($format) ?
            $diffInDays = $this->makeDate($day1)->diffInDays($this->makeDate($day2)) :
            $this->makeDate($day1)->{'diffIn'.$format}($this->makeDate($day2)) ;

            // dd($diffInDays);
            return $diffInDays ;
    }
}
