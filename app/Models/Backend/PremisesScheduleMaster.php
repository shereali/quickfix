<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremisesScheduleMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'schedule_day',
        'start_time',
        'end_time',
        'schedule_create_id',
        'schedule_duration',
        'repeat_status',
        'repeat_schedule',
        'status',
        
    ];

    public function premisesscheduleDetails(){
        return $this->hasMany(PremisesScheduleDetails::class);
    }

    public function getChamber(){
        return $this->belongsTo(Chamber::class);
    }

    public function day(){
        return $this->hasOne(Day::class,'id');
    }

    
}
