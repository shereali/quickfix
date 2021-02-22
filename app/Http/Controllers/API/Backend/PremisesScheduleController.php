<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use DB;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\PremisesScheduleResource;
use App\Models\Backend\Day;
use App\Models\Backend\PremisesScheduleDetails;
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
      
        $userId = Auth::user()->id;
        $validated = $request->validate([
            'start_time' => 'required'
            
        ]);


        $schedule_day                             = $request->schedule_day;
        $startTime                                = $request->start_time;
        $endTime                                  = $request->end_time;
        $duration                                 = $request->schedule_duration;
        $schedule_create                          = 2;

         
         
        $newVale = explode(",", $schedule_day);
        $days = [];
        for($i=0; $i< count($newVale); $i++){
            $days[] = (int)$newVale[$i];
        }
        
        $ScheduleStore = PremisesScheduleMaster::create([
            'schedule_day'       => json_encode($days),
            'start_time'         => $startTime,
            'end_time'           => $endTime,
            'schedule_create_id' => $schedule_create,
            'schedule_duration'  => $duration,
            'repeat_status'      => 1,
            'repeat_schedule'    => 1,
            'status'             => $request->status,
            'created_by'         => $userId,
        ]);  
            
        foreach ($days as $key => $daySlot) {
            $totalSchedules = Helper::allScheduleTimes($startTime, $endTime, $duration);
            
            $createScheduleDates = array();

            if ($ScheduleStore) {
                $day = $daySlot;
                for ($i=0; $i < $schedule_create; $i++) {
                    $sTime = $startTime;
                    $eTime = Helper::addtime($sTime, $duration);
                    $date = Helper::dayWiseDate(($i*7) + $daySlot);
                    foreach ($totalSchedules as $totalSchedule) {
                        PremisesScheduleDetails::create([
                            'premises_schedule_masters_id'      => $ScheduleStore->id,
                            'day_id'                            => $daySlot,
                            'schedule_date'                     => $date,
                            'start_time'                        => $sTime,
                            'end_time'                          => $eTime,
                            'status'                            => 0,
                            'created_by'                        => $userId,
                        ]);

                        $sTime = $totalSchedule;
                        $eTime = Helper::addtime($totalSchedule, $duration);
                    }
                }
            }
        }

        if ($ScheduleStore){
            return response()->json([
                'status'  => 'success',
                'message' => 'Schedule has been created!',
                'icon'    => 'check',
            ]);
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
        $premises_schedule_master = PremisesScheduleMaster::find($id);
        return new PremisesScheduleResource($premises_schedule_master);
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
        $userId = Auth::user()->id;
        $validated = $request->validate([
            'start_time' => 'required'
            
        ]);


        $schedule_day    = $request->schedule_day;
        $startTime       = $request->start_time;
        $endTime         = $request->end_time;
        $duration        = $request->schedule_duration;
        $schedule_create = 2;

        $currentDate = date("Y-m-d");
        $preDataDetails = PremisesScheduleDetails::where('schedule_date','>',$currentDate)->where('status',0)->where('premises_schedule_masters_id',$id)->delete();
        // $deleteScheduleDetails = $preDataDetails->delete();
        // if($preDataDetails){
            $newVale = explode(",", $schedule_day);
            $days = [];
            for($i=0; $i< count($newVale); $i++){
                 $days[] = (int)$newVale[$i];
             }
             $ScheduleStore = PremisesScheduleMaster::find($id)->update([
                'schedule_day'       => json_encode($days),
                'start_time'         => $startTime,
                'end_time'           => $endTime,
                'schedule_create_id' => $schedule_create,
                'schedule_duration'  => $duration,
                'repeat_status'      => 1,
                'repeat_schedule'    => $schedule_create,
                'status'             => $request->status,
                'created_by'         => $userId,
            ]);
            foreach ($days as $key => $daySlot) {
                $totalSchedules = Helper::allScheduleTimes($startTime, $endTime, $duration);
                
                $createScheduleDates = array();
    
                if ($ScheduleStore) {
                    $day = $daySlot;
                    for ($i=0; $i < $schedule_create; $i++) {
                        $sTime = $startTime;
                        $eTime = Helper::addtime($sTime, $duration);
                        $date = Helper::dayWiseDate(($i*7) + $daySlot);
                        foreach ($totalSchedules as $totalSchedule) {
                            PremisesScheduleDetails::create([
                                'premises_schedule_masters_id'      => $id,
                                'day_id'                            => $daySlot,
                                'schedule_date'                     => $date,
                                'start_time'                        => $sTime,
                                'end_time'                          => $eTime,
                                'status'                            => 0,
                                'created_by'                        => $userId,
                            ]);
    
                            $sTime = $totalSchedule;
                            $eTime = Helper::addtime($totalSchedule, $duration);
                        }
                    }
                }
            }
            if ($ScheduleStore){
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Schedule has been updated!',
                    'icon'    => 'check',
                ]);
            }

        // }      
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
         $data =DB::table('premises_schedule_masters')
                ->leftJoin('premises_schedule_details','premises_schedule_masters.id', '=','premises_schedule_details.premises_schedule_masters_id')
                ->where('premises_schedule_masters.id', $id); 
         DB::table('premises_schedule_details')->where('premises_schedule_masters_id', $id)->delete();                           
         $delete = $data->delete();
        if($delete){
            DB::commit();
            return response()->json([
                'status'  => 'danger',
                'message' => 'Schedule has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
