<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceProblemResource extends JsonResource
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
            'device_id'                 => $this->device_id,
            'device_name'               => $this->device_name,
            'device_functional_type_id' => $this->device_functional_type_id,
            'name'                      => $this->name,
            'service_type_id'           => $this->service_type_id,
            'brand_id'                  => $this->brand_id,
            'brand_name'                => $this->brand_name,
            'device_model_id'           => $this->device_model_id,
            'model_number'              => $this->model_number,
            'problem_type_id'           => $this->problem_type_id,
            'problem'                   => $this->problem,
            'description'               => $this->description,
            'original_price'            => $this->original_price,
            'master_copy_price'         => $this->master_copy_price,
            'status'                    => $this->status,
            'statusText'                => $this->status == 1?'Active':'Inactive',
            'image'                     => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/device-problem').'/'.$this->image.'">',
            'image_path'                => Helper::publicUrl('/images/device-problem').'/'.$this->image
        ];
    }
}
