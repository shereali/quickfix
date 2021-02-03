<?php

namespace App\Models\Backend;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceProblem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'device_id',
        'device_functional_type_id',
        'service_type_id',
        'brand_id',
        'device_model_id',
        'problem_type_id',
        'problem',
        'description',
        'original_price',
        'master_copy_price',
        'status',
        'created_by_type',
        'updated_by_type',
        'deleted_by_type',
    ];
    public static function boot()
    {
       parent::boot();
       static::creating(function($model)
       {
           $user = Auth::user();
           $model->created_by = $user->id;
           $model->updated_by = $user->id;
       });
       static::updating(function($model)
       {
           $user = Auth::user();
           $model->updated_by = $user->id;
       });
   }
}
