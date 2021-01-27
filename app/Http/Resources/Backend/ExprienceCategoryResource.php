<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class ExprienceCategoryResource extends JsonResource
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
            'title'                      => $this->title,
            'image'                      => $this->image,
            'description'               => $this->description,
            'status'                    => $this->status,
            'statusText'                => $this->status == 1?'Active':'Inactive',
            'image'                     => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/exprience-category').'/'.$this->image.'">',
            'image_path'                => Helper::publicUrl('/images/exprience-category').'/'.$this->image
        ];
    }
}
