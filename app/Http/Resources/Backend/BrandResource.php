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
            'id'                  => $this->id,
            'service_category_id' => $this->service_category_id,
            'brand_name'          => $this->brand_name,
            'brand_description'   => $this->brand_description,
            'status'              => $this->status,
            'image'               => '<img src="'.Helper::publicUrl('/images/service').'/'.$this->image.'">',
            'image_path'          => Helper::publicUrl('/images/service').'/'.$this->image
        ];
    }
}
