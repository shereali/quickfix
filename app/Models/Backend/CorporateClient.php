<?php

namespace App\Models\Backend;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'customer_id',
        'contact_person_name',
        'contact_person_number',
        'designation',
        'division_id',
        'district_id',
        'zone_id',
        'address',
        'web_address',
        'no_of_employee',
        'support_type',
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
       static::deleting(function($model)
       {
           $user = Auth::user();
           $model->deleted_by = $user->id;
       });
   }
}
