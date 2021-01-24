<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'device_model_id',
        'name',
        'description',
        'image',
        'status',
    ];
    public function deviceModel()
    {
        return $this->belongsTo(DeviceModel::class,'device_model_id','id');
    }
}
