<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstantCalls extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'mobile_number',
        'email',
        'status',
        'job_status',
        'remarks',
        'created_by_type',
        'updated_by_type',
        'deleted_by_type',
    ];

    // public  function instantCallStatus()
    // {
    //     return $this->belongsTo()

    // }
}
