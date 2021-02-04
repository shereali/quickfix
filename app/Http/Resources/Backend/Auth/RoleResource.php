<?php

namespace App\Http\Resources\Backend\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $access = [];
        foreach($this->permissions as $key => $permission){
            if($permission){
                
                $access[$key] = $permission->pivot->permission_id;
            }
        }
        
        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'access'     => $access
        ];
    }
}
