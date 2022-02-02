<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class DateController extends Controller
{
    public function __construct()
    {

    }

    public function getDayDiffNumber(Request $request)
    {
        try{
            $dateHelper = new DateHelper();
            $diffNumber = $dateHelper->getDaysDiff($request->date1, $request->date2, null);
        }catch(Exception $e){

            return response(['error' => $e->getMessage(), ],200);
        }
        return response(['numberofday' => $diffNumber],200);

    }
    public function getWeekDiffNumber(Request $request)
    {
        try{
            $dateHelper = new DateHelper();
            $diffNumber = $dateHelper->getWeekDiff($request->date1, $request->date2, null);
        }catch(Exception $e){

            return response(['error' => $e->getMessage(), ],200);
        }
        return response(['numberofweeks' => $diffNumber],200);

    }

    public function conventIntoFormat(Request $request)
    {
        $formats = collect(
                ['Hours', 'Minutes', 'Seconds', 'Years']
            ) ;
        if(! ($request->has('format') && $formats->contains($request->format))){
            throw new Exception('Invalid Date format provided');
        }
        try{
            $dateHelper = new DateHelper();
            $diffNumber = $dateHelper->convertDate($request->date1, $request->date2, $request->format);
        }catch(Exception $e){
            dd($e);

            return response(['error' => $e, ],200);
        }
        return response(['formated_date' => $diffNumber, 'format' => $request->format],200);

    }

}
