<?php

namespace App\Http\Resources\Backend;

use App\Models\Backend\CustomerOtherImage;
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
       
       $nidImage          = $this->businessPartner->nid_image??'';
       $tradeLicenseImage = $this->businessPartner->tradelicense_image??'';

        return [

            'id'                          => $this->id,
            'customer_type'               => $this->customer_type,
            'customer_id'                 => $this->customer_id,
            'b_contact_person_name'       => $this->businessPartner->contact_person_name??'',
            'b_contact_person_number'     => $this->businessPartner->contact_person_number??'',
            'b_designation'               => $this->businessPartner->designation??'',
            'b_division_id'               => $this->businessPartner->division_id??'',
            'b_district_id'               => $this->businessPartner->district_id??'',
            'b_zone_id'                   => $this->businessPartner->zone_id??'',
            'b_address'                   => $this->businessPartner->address??'',
            'b_web_address'               => $this->businessPartner->web_address??'',
            'b_no_of_employee'            => $this->businessPartner->no_of_employee??'',
            'b_device_type_id'            =>[$this->businessPartner->device_type_id??''] ,
            'b_device_functional_type_id' => $this->businessPartner->device_functional_type_id??'',
            'b_work_experience_id'        => $this->businessPartner->work_experience_id??'',
            'b_experience_category_id'    => $this->businessPartner->experience_category_id??'',
            'b_nid_no'                    => $this->businessPartner->nid_no??'',
            'nid_image'                   => $nidImage,
            'image_nid'                   => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/nid').'/'.$nidImage??''.'">',
            'image_path_nid'              => Helper::publicUrl('/images/nid').'/'.$nidImage,
            'tradelicense_image'          => $tradeLicenseImage,
            'image_tradelicense'          => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/tradelicense').'/'. $tradeLicenseImage.'">',
            'image_path_tradelicense'     => Helper::publicUrl('/images/tradelicense').'/'. $tradeLicenseImage,
            'working_place_image'         => CustomerOtherImage::where('customer_id',$this->id)->first()->image??'',

            'c_contact_person_name'       => $this->corporateClient->contact_person_name??'',
            'c_contact_person_number'     => $this->corporateClient->contact_person_number??'',
            'c_designation'               => $this->corporateClient->designation??'',
            'c_division_id'               => $this->corporateClient->division_id??'',
            'c_district_id'               => $this->corporateClient->district_id??'',
            'c_zone_id'                   => $this->corporateClient->zone_id??'',
            'c_address'                   => $this->corporateClient->address??'',
            'c_web_address'               => $this->corporateClient->web_address??'',
            'c_no_of_employee'            => $this->corporateClient->no_of_employee??'',
            'c_support_type'              => $this->corporateClient->support_type??'',
            
            'division_id'                 => $this->customerDetail->division_id??'',
            'district_id'                 => $this->customerDetail->district_id??'',
            'zone_id'                     => $this->customerDetail->zone_id??'',
            'address'                     => $this->customerDetail->address??'',
            'web_address'                 => $this->web_address,
            'no_of_employee'              => $this->no_of_employee,
            'support_type'                => $this->support_type,
            'referral_id'                 => $this->referral_id,
            'coins'                       => $this->coins,
            'bonus_amounts'               => $this->bonus_amounts,
            'withdraw_amounts'            => $this->withdraw_amounts,
            'name'                        => $this->name,
            'mobile_number'               => $this->mobile_number,
            'email'                       => $this->email,
            'verify_status'               => $this->verify_status,
            'verfied_code'                => $this->verfied_code,
            'otp'                         => $this->otp,
            'firebase_token'              => $this->firebase_token,
            'web_token'                   => $this->web_token,
            'signup_status'               => $this->signup_status,
            'password'                    => $this->password,
            'rember_token'                => $this->rember_token,
            'image'                       => $this->image,
            'statusText'                  => $this->status == 1?'Active':'Inactive',
            'image'                       => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/customer').'/'.$this->image.'">',
            'image_path'                  => Helper::publicUrl('/images/customer').'/'.$this->image
        ];
    }
}
