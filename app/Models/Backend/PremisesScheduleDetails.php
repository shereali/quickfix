<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremisesScheduleDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'premises_schedule_masters_id',
        'day_id',
        'schedule_date',
        'start_time',
        'end_time',
        'status',
    ];


    public function premisesScheduleMaster(){
        return $this->belongsToMany(PremisesScheduleMaster::class);
    }

    // public function day(){
    //     return $this->hasOne(Day::class, 'day_id','id');
    // }
}
