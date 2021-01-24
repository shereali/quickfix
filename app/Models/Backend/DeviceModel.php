<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'brand_id',
        'model_name',
        'model_number',
        'description',
        'image',
        'status',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
}
