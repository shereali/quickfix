<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceModelResource extends JsonResource
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

            'id'           => $this->id,
            'brand_id'     => $this->brand_id,
            'brand_name'   => $this->brand_name,
            'model_name'   => $this->model_name,
            'model_number' => $this->model_number,
            'description'  => $this->description,
            'image'        => $this->image,
            'brand_name'   => $this->brand->brand_name,
            'status'       => $this->status,
            'statusText'   => $this->status == 1?'Active':'Inactive',
            'image'        => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/device-model').'/'.$this->image.'">',
            'image_path'   => Helper::publicUrl('/images/device-model').'/'.$this->image
        ];
    }
}
