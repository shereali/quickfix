<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'device_id',
        'brand_name',
        'description',
        'image',
        'status',
    ];
    public function device()
    {
        return $this->belongsTo(Device::class,'device_id','id');
    }
}
