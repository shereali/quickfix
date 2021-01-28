<?php

namespace App\Http\Resources\Backend;

use Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class BonusResource extends JsonResource
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
            'description' => $this->description,
            'start_date'  => $this->start_date,
            'end_date'    => $this->end_date,
            'amount'      => $this->amount,
            'user_type'   => $this->user_type,
            'image'       => $this->image,
            'bonus_type'  => $this->bonus_type,
            'status'      => $this->status,
            'statusText'  => $this->status == 1?'Active':'Inactive',
            'image'       => '<img style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/images/customer-registration').'/'.$this->image.'">',
            'image_path'  => Helper::publicUrl('/images/customer-registration').'/'.$this->image
            ];
    }
}
