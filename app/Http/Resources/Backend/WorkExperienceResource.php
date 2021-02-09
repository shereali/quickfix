<?php

namespace App\Http\Resources\Backend;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkExperienceResource extends JsonResource
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
            'title'           => $this->title,
            'experience'      => $this->experience,
            'service_type_id' => $this->service_type_id,
            'description'     => $this->description,
            'status'          => $this->status,
            'statusText'      => $this->status == 1?'Active':'Inactive',
        ];
    }
}
