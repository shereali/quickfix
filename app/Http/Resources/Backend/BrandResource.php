<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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

            'id'          => $this->id,
            'device_id'   => $this->device_id,
            'device_name' => $this->device_name,
            'brand_name'  => $this->brand_name,
            'description' => $this->description,
            'image'       => $this->image,
            'device_name' => $this->device->device_name,
            'status'      => $this->status,
            'statusText'  => $this->status == 1?'Active':'Inactive',
            'image'       => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/brands').'/'.$this->image.'">',
            'image_path'  => Helper::publicUrl('/images/brands').'/'.$this->image
        ];
    }
}
