<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
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

            'id'             => $this->id,
            'device_type_id' => $this->device_type_id,
            'device_name'    => $this->device_name,
            'type_name'    => $this->type_name,
            'description'    => $this->description,
            'image'          => $this->image,
            'type_name'      => $this->deviceType->type_name,
            'status'         => $this->status,
            'statusText'     => $this->status == 1?'Active':'Inactive',
            'image'          => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/device').'/'.$this->image.'">',
            'image_path'     => Helper::publicUrl('/images/device').'/'.$this->image
        ];
    }
}
