<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class OurServiceProcessResource extends JsonResource
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
            'title'       => $this->title,
            'step_no'     => $this->step_no,
            'image'       => $this->image,
            'description' => $this->description,
            'status'      => $this->status,
            'statusText'  => $this->status == 1?'Active':'Inactive',
            'image'       => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/service-process').'/'.$this->image.'">',
            'image_path'  => Helper::publicUrl('/images/service-process').'/'.$this->image
        ];
    }
}
