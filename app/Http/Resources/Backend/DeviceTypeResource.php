<?php

namespace App\Http\Resources\Backend;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceTypeResource extends JsonResource
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
            'id'        => $this->id,
            'type_name' => $this->type_name,
            'status'    => $this->status,
            'statusText' => $this->status == 1?'Active':'Inactive',
        ];
    }
}
