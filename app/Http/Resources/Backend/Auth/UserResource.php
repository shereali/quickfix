<?php

namespace App\Http\Resources\Backend\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'       => $this->id,
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => $this->password,
            'role_name' => $this->role->name??'',
            'role_id'  => $this->role->id??'',
            'roles'    => $this->roles,
        ];
    }
}
