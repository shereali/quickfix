<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id'                    => $this->id,
            'customer_type'         => $this->customer_type,
            'customer_id'           => $this->customer_id,
            'contact_person_name'   => $this->contact_person_name,
            'contact_person_number' => $this->contact_person_number,
            'designation'           => $this->designation,
            'division_id'           => $this->customerDetail->division_id??'',
            'district_id'           => $this->customerDetail->district_id??'',
            'zone_id'               => $this->customerDetail->zone_id??'',
            'address'               => $this->customerDetail->address??'',
            'web_address'           => $this->web_address,
            'no_of_employee'        => $this->no_of_employee,
            'support_type'          => $this->support_type,
            'referral_id'           => $this->referral_id,
            'coins'                 => $this->coins,
            'bonus_amounts'         => $this->bonus_amounts,
            'withdraw_amounts'      => $this->withdraw_amounts,
            'name'                  => $this->name,
            'mobile_number'         => $this->mobile_number,
            'email'                 => $this->email,
            'verify_status'         => $this->verify_status,
            'verfied_code'          => $this->verfied_code,
            'otp'                   => $this->otp,
            'firebase_token'        => $this->firebase_token,
            'web_token'             => $this->web_token,
            'signup_status'         => $this->signup_status,
            'password'              => $this->password,
            'rember_token'          => $this->rember_token,
            'image'                 => $this->image,
            'statusText'            => $this->status == 1?'Active':'Inactive',
            'image'                 => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/customer').'/'.$this->image.'">',
            'image_path'            => Helper::publicUrl('/images/customer').'/'.$this->image
        ];
    }
}
