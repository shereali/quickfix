<?php

namespace App\Models\Backend;

use Auth;
use App\Models\Backend\DeviceType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'device_type_id',
        'device_name',
        'description',
        'image',
        'status',
    ];

    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class,'device_type_id','id');
    }


}
