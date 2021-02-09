<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class CorporateClientResource extends JsonResource
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
            'customer_id'           => $this->customer_id,
            'name'                  => $this->customer->name,
            'mobile_number'         => $this->customer->mobile_number,
            'email'                 => $this->customer->email,
            'contact_person_name'   => $this->contact_person_name,
            'contact_person_number' => $this->contact_person_number,
            'designation'           => $this->designation,
            'division_id'           => $this->division_id,
            'division_name'         => $this->division->name,
            'district_id'           => $this->district_id,
            'district_name'         => $this->district->name,          
            'zone_id'               => $this->zone_id,
            'zone_name'             => $this->zone->zone_name,
            'address'               => $this->address,
            'web_address'           => $this->web_address,
            'no_of_employee'        => $this->no_of_employee,
            'support_type'          => $this->support_type,
            'referral_id'           => $this->referral_id,
            'coins'                 => $this->coins,
            'bonus_amounts'         => $this->bonus_amounts,
            'withdraw_amounts'      => $this->withdraw_amounts,
 
        ];
    }
}
