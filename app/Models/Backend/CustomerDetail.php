<?php

namespace App\Models\Backend;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'customer_id',
        'division_id',
        'district_id',
        'zone_id',
        'address',
        'referral_id',
        'coins',
        'bonus_amounts',
        'withdraw_amounts',
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
