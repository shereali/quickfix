<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'id'                  => $this->id,
            'name'                => $this->name,
            'service_description' => $this->service_description,
            'status'              => $this->status,
            'image'               => '<img src="'.Helper::publicUrl('/images/service').'/'.$this->image.'">',
            'image_path'          => Helper::publicUrl('/images/service').'/'.$this->image 
        ];
    }
}
