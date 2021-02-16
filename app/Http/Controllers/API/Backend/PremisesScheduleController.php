<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use DB;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\PremisesScheduleResource;
use App\Models\Backend\Day;
use App\Models\Backend\PremisesScheduleMaster;
use App\Models\Backend\ScheduleCreate;
use Illuminate\Http\Request;

class PremisesScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $dataSorting = $request->sorting == 'false'?10:$request->sorting;
        
            $data =$search == 'false'?PremisesScheduleMaster::orderBy('id', 'desc')->paginate($dataSorting):PremisesScheduleMaster::where(function($query) use($search){
            $query->orWhere('start_time', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        $days = Day::where('status', 1)->get();
        $scheduleCreates = ScheduleCreate::all();

 

        return  PremisesScheduleResource::collection($data)->additional([
            'days'                      =>$days,
            'scheduleCreates'           =>$scheduleCreates,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $userId = Auth::user()->id;
        $validated = $request->validate([
            'start_time' => 'required'
            
        ]);

        $chamberDay                             = $request->chamber_day;
        $startTime                              = $request->chamber_start_time;
        $endTime                                = $request->chamber_end_time;
        $duration                               = $request->schedule_duration;
        $schedule_create                        = $request->schedule_create;

       

        
            $chamberScheduleStore = ChamberScheduleMaster::create([
                'chamber_id'                    => $request->chamber,
                'schedule_day'                  => json_encode($chamberDay, true),
                'chamber_start_time'            => $startTime,
                'chamber_end_time'              => $endTime,
                'schedule_create'               => $schedule_create,
                'schedule_duration'             => $duration,
                'repeat_status'                 => $request->repeat_status,
                'repeat_schedule'               => ($request->repeat_status==1)? $request->repeat_schedule:0,
                'status'                        => '1',
                'created_by_type'               => '2',
                'created_by'                    => $userId,
            ]); 

         
            
            foreach ($chamberDay as $key => $daySlot) {
            $totalSchedules = Helper::allScheduleTimes($startTime, $endTime, $duration);
            
            $createScheduleDates = array();

            if ($chamberScheduleStore) {
               

                $day = $daySlot;
                for ($i=0; $i < $schedule_create; $i++) {
                    $sTime = $startTime;
                    $eTime = Helper::addtime($sTime, $duration);
                    $date = Helper::dayWiseDate(($i*7) + $daySlot);
                    foreach ($totalSchedules as $totalSchedule) {
                        ChamberScheduleDetail::create([
                            'chamber_schedule_master_id'    => $chamberScheduleStore->id,
                            'day'                           => $daySlot,
                            'schedule_date'                 => $date,
                            'start_time'                    => $sTime,
                            'end_time'                      => $eTime,
                            'status'                        => '1',
                            'created_by_type'               => '2',
                            'created_by'                    => $userId,
                        ]);

                        $sTime = $totalSchedule;
                        $eTime = Helper::addtime($totalSchedule, $duration);
                    }
                }
            }
        


            if ($chamberScheduleStore){
                $data['successMessage'] = "Chamber Schedule Created Successfully";
                DB::commit();
                return $data;
            }            
        }
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
