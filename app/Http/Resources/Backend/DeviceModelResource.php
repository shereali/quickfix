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
            'id'                => $this->id,
            'model_name'        => $this->model_name,
            'model_number'      => $this->model_number,
            'model_description' => $this->model_description,
            'status'            => $this->status,
            'image'               => '<img src="'.Helper::publicUrl('/images/device-model').'/'.$this->image.'">',
            'image_path'          => Helper::publicUrl('/images/device-model').'/'.$this->image
        ];
    }
}
