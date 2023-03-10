<?php

namespace App\Http\Controllers\Api\v1;

use Carbon\Carbon;
use App\Models\OffDay;
use Carbon\CarbonPeriod;
use App\Models\StoreHour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HourResource;
use App\Http\Resources\OffDayResource;
use App\Http\Resources\OffDaysCollection;
use App\Models\Postal;
use App\Models\StoreDay;
use App\Models\Tax;
use Carbon\CarbonInterval;

class BookScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tax = Tax::latest()->first(['tax']);
        $offDays = OffDay::all(['date']); 
        $operational = StoreHour::all()->keyBy('key');
        $postals = Postal::where('status','1')->get(['postal_code']);
        $arrayPostal = [];
        foreach ($postals as $postal) {
            array_push($arrayPostal, $postal->postal_code);
        }
        
        $startDate = $request->dateNow;
        $endDate = Carbon::parse($startDate)->addDays($request->long);
        
        //generate array of numeric bussiness day
        $bussinessDay = StoreDay::all('day');
        $arrayBussinessDay = [];
        foreach ($bussinessDay as $date) {
            array_push($arrayBussinessDay, $date->day);
        }
        
        $closeDates = $this->getOffDays($startDate, $endDate, $arrayBussinessDay);
        
        foreach ($offDays as $date) {
            if (!in_array($date->date, $closeDates)) {
                array_push($closeDates, $date->date);
            }
        }

        $schedules = $this->getHoursInterval($operational['morningSchedule']['hourFrom'], 30, $operational['morningSchedule']['hourUntil']);
        $afternoonSchedule = $this->getHoursInterval($operational['afternoonSchedule']['hourFrom'], 30, $operational['afternoonSchedule']['hourUntil']);
        foreach ($afternoonSchedule as $new) {
            array_push($schedules, $new);
        }
        return [
            'offDays'   => $closeDates,
            'schedules' => $schedules,
            'postals'   => $arrayPostal,
            'tax'       => $tax->tax,

        ];
    }

    function getOffDays($startDate, $endDate, $bussinessDay)
    {
        $start = Carbon::parse($startDate);
        $closeDays = [];
    
        $period = new CarbonPeriod($start, '1 day', $endDate);
        foreach ($period as $date) {
            if (!in_array($date->format('w'),$bussinessDay)) {
                $closeDays[] = $date->format('Y-m-d');
            }
        }
    
        return $closeDays;
    }
    
    function getHoursInterval($startDate, $steps, $endDate)
    {
        $intervals = CarbonInterval::minutes($steps)->toPeriod($startDate, $endDate);
        $hours = [];
        foreach ($intervals as $interval) {
            # code...
            $hours[] = $interval->format('Y-m-d H:i');
        }
        return $hours;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
