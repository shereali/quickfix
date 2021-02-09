<?php

namespace App\Models\Backend;

use Auth;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
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
        'created_by_type',
        'updated_by_type',
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
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id','id');
    }
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id','id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id','id');
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id','id');
    }
}
