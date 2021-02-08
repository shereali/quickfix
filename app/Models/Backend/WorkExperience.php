<?php

namespace App\Models\Backend;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'experience',
        'description',
        'status',
    ];
    public static function boot()
    {
       parent::boot();
       static::creating(function($model)
       {
           $user = Auth::user();
           $model->created_by = $user->id;
           
       });
       static::updating(function($model)
       {
           $user = Auth::user();
           $model->updated_by = $user->id;
       });
   }
}
