<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceTypeResource extends JsonResource
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
            'name'         => $this->name,
            'description'  => $this->description,
            'image'        => $this->image,
            'status'       => $this->status,
            'statusText'   => $this->status == 1?'Active':'Inactive',
            'image'        => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/service-type').'/'.$this->image.'">',
            'image_path'   => Helper::publicUrl('/images/service-type').'/'.$this->image,
            'serviceImage' => '<img  class="img-fluid" src="'.Helper::publicUrl('/images/service-type').'/'.$this->image.'">',
        ];
    }
}
