<?php

namespace App\Http\Resources\Backend;

use App\Models\Backend\CustomerOtherImage;
use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessPartnerResource extends JsonResource
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

            'id'                        => $this->id,
            'customer_id'                => $this->customer->id,
            'name'                      => $this->customer->name,
            'email'                     => $this->customer->email,
            'mobile_number'             => $this->customer->mobile_number,            
            'contact_person_name'       => $this->contact_person_name,
            'contact_person_number'     => $this->contact_person_number,
            'designation'               => $this->designation,
            'division_id'               => $this->division_id,
            'district_id'               => $this->district_id,        
            'zone_id'                   => $this->zone_id,
            'address'                   => $this->address,
            'web_address'               => $this->web_address,
            'no_of_employee'            => $this->no_of_employee,
            'device_type_id'            => $this->device_type_id,
            'device_functional_type_id' => $this->device_functional_type_id,
            'work_experience_id'        => $this->work_experience_id,
            'nid_no'                    => $this->nid_no,
            'nid_image'                 => $this->nid_image,
            'image_nid'                 => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/nid').'/'.$this->nid_image.'">',
            'image_path_nid'            => Helper::publicUrl('/images/nid').'/'.$this->nid_image,
            
            'experience_category_id'    => $this->experience_category_id,
            'tradelicense_image'        => $this->tradelicense_image,
            'image_tradelicense'        => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/tradelicense').'/'.$this->tradelicense_image.'">',
            'image_path_tradelicense'   => Helper::publicUrl('/images/tradelicense').'/'.$this->tradelicense_image,
            'working_place_image'       => CustomerOtherImage::where('customer_id',$this->customer->id)->first()->image,

 
        ];
    }
}
