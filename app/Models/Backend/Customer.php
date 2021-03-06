<?php

namespace App\Models\Backend;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'customer_type',
        'name',
        'mobile_number',
        'email',
        'verify_status',
        'verfied_code',
        'otp',
        'firebase_token',
        'web_token',
        'signup_status',
        'password',
        'rember_token',
        'image',
        'verify_status',
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
   }

   public function customerDetail()
   {
       return $this->hasOne(CustomerDetail::class,'customer_id','id');
   }
   public function businessPartner()
   {
       return $this->hasOne(BusinessPartner::class,'customer_id','id');
   }
   public function corporateClient()
   {
       return $this->hasOne(CorporateClient::class,'customer_id','id');
   }
  


}
