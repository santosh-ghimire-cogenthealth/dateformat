<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Http\Requests\DateRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class DateController extends Controller
{

    /**
     * intialize Datehelper Class from servive provider binding
     * @dependency Injection DI DateHelper class resolve DateHelper class
     */
    public function __construct(DateHelper $dateHelper)
    {
        $this->dateHelper = $dateHelper ;
    }

    /**
     * @param Api\Request $request optional //optional request parameter  may coming
     * @return  responseJson int|string
     */
    public function getDayDiffNumber(DateRequest $request)
    {
        try{
            $diffNumber = $this->dateHelper->getDaysDiff($request->date1, $request->date2, $request->format);
        }catch(Exception $e){

            return response(['error' => $e->getMessage(), ], 200);
        }
        return response(['numberofday' => $diffNumber, 'format' => $request->format],200);

    }

    /**
     * @param Api\Request $request optional //optional request parameter  may coming
     * @param Request $request data types date format and strings
     * @return  responseJson int|string
     */
    public function getWeekDiffNumber(DateRequest $request)
    {
        try{
            $diffNumber = $this->dateHelper->getWeekDiff($request->date1, $request->date2, $request->format);
        }catch(Exception $e){

            return response(['error' => $e->getMessage(), ], 200);
        }
        return response(['numberofweeks' => $diffNumber, 'format' => $request->format],200);

    }

    /**
     * @param Api\Request $request optional //optional request parameter  may coming
     * @param Request $request data types date format and strings
     * @return  responseJson int|string
     */
    public function getWeeksDays(DateRequest $request)
    {
        try{
            $weekDays = $this->dateHelper->getWeeksDays($request->date1, $request->date2, $request->format);
        }catch(Exception $e){

            return response(['error' => $e->getMessage(), ], 200);
        }
        return response(['weekdays' => $weekDays, 'format' => $request->format],200);

    }

    /**
     * @param Api\Request $request optional //optional request parameter  may coming
     * @param Request $request data types date format and strings
     * @return  responseJson int|string
     */
    public function conventIntoFormat(DateRequest $request)
    {
        try{
            $diffNumber = $this->dateHelper->convertDate($request->date1, $request->date2, $request->format);
        }catch(Exception $e){
            return response(['error' => $e->getMessage(), ], 200);
        }
        return response(['formated_date' => $diffNumber, 'format' => $request->format],200);

    }

     /**
     * @param Api\Request $request optional //optional request parameter  may coming
     * @param Request $request data types date format and strings
     * @return  responseJson int|string
     */
    public function compareTimeZone(DateRequest $request)
    {
        try{
            $diffNumber = $this->dateHelper->timeZoneComparasion($request->date1, $request->date2, $request->format);
        }catch(Exception $e){
            return response(['error' => $e->getMessage(), ], 200);
        }
        return response(['formated_date' => $diffNumber, 'format' => $request->format],200);

    }

}
