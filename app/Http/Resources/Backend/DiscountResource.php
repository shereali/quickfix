<?php

namespace App\Http\Resources\Backend;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
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
            'id'                   => $this->id,
            'title'                => $this->title,
            'code'                 => $this->code,
            'description'          => $this->description,
            'discount_value'       => $this->discount_value,
            'discount_start_date'  => $this->discount_start_date,
            'discount_expire_date' => $this->discount_expire_date,
            'status'               => $this->status,
        ];
    }
}
