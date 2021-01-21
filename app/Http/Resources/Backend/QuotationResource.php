<?php

namespace App\Http\Resources\Backend;

use Illuminate\Http\Resources\Json\JsonResource;

class QuotationResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'brand_name' => $this->brand_name,
            'email' => $this->email,
            'device_name' => $this->device_name,
            'model_number' => $this->model_number,
            'phone_number' => $this->phone_number,
            'problem' => $this->problem,
        ];
    }
}
