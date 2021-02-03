<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class ZoneResource extends JsonResource
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

            'id'              => $this->id,
            'division_id'     => $this->division_id,
            'district_id'     => $this->district_id,
            'service_type_id' => $this->service_type_id,
            'charge'          => $this->charge,
            'name'            => $this->name,
            'description'     => $this->description,
            'image'           => $this->image,
            'status'          => $this->status,
            'statusText'      => $this->status == 1?'Active':'Inactive',
            'image'           => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/zone').'/'.$this->image.'">',
            'image_path'      => Helper::publicUrl('/images/zone').'/'.$this->image
        ];
    }
}
