<?php

namespace App\Models\Backend;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPartner extends Model
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
        'device_type_id',
        'device_functional_type_id',
        'nid_no',
        'nid_image',
        'experience_category_id',
        'tradelicense_image',
        'name',
        'created_by_type',
        'updated_by_type',
        
    ];
    public function setCatAttribute($value)
    {
        $this->attributes['device_type_id'] = json_encode($value);
        $this->attributes['device_functional_type_id'] = json_encode($value);
    }
    public function getCatAttribute($value)
    {
        return $this->attributes['device_type_id'] = json_decode($value);
        return $this->attributes['device_functional_type_id'] = json_decode($value);
    }
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
   public function customer()
   {
    return $this->belongsTo(Customer::class,'customer_id','id');
   }


   
   

}
