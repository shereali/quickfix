<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class ProblemTypeResource extends JsonResource
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
            'device_model_id' => $this->device_model_id,
            'name'            => $this->name,
            'model_name'      => $this->model_name,
            'description'     => $this->description,
            'image'           => $this->image,
            'model_number'      => $this->deviceModel->model_number,
            'status'          => $this->status,
            'statusText'      => $this->status == 1?'Active':'Inactive',
            'image'           => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/problem-type').'/'.$this->image.'">',
            'image_path'      => Helper::publicUrl('/images/problem-type').'/'.$this->image
        ];
    }
}
