<?php

namespace App\Http\Resources\Backend;

use App\Models\Backend\Day;
use Illuminate\Http\Resources\Json\JsonResource;

class PremisesScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id'                 => $this->id,
            'schedule_day'       => Day::whereIn('sl_no', json_decode($this->schedule_day, true))->pluck('sl_no'),
            'start_time'         => $this->start_time,
            'end_time'           => $this->end_time,
            'schedule_create_id' => $this->schedule_create_id,
            'schedule_duration'  => $this->schedule_duration,
            'repeat_status'      => $this->repeat_status,
            'repeat_schedule'    => $this->repeat_schedule,
            'status'             => $this->status,
            'statusText'         => $this->status == 1?'Active':'Inactive',
            
        ];
    }
}
