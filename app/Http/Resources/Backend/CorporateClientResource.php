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
            'contact_person_name'   => $this->contact_person_name,
            'contact_person_number' => $this->contact_person_number,
            'designation'           => $this->designation,
            'division_id'           => $this->division_id,
            'district_id'           => $this->district_id,
            'zone_id'               => $this->zone_id,
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
