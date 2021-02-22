<?php

namespace App\Http\Resources\Administrator;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $readbtn = $this->read == 1?'checked':'unchecked';
        $writebtn = $this->write == 1?'checked':'unchecked';
        $updatebtn = $this->update == 1?'checked':'unchecked';
        $deletebtn = $this->delete == 1?'checked':'unchecked';
        
        return [
            'id'              => $this->id,
            'describe_name'   => $this->describe_name,
            'resource_name'   => $this->resource_name,
            'read'            => $this->read,
            'write'           => $this->write,
            'update'          => $this->update,
            'delete'          => $this->delete,

            'read_checkbox'   => '<input type="checkbox" '.$readbtn.'>',
            'write_checkbox'  => '<input type="checkbox" '.$writebtn.'>',
            'update_checkbox' => '<input type="checkbox" '.$updatebtn.'>',
            'delete_checkbox' => '<input type="checkbox" '.$deletebtn.'>',

        ];
    }
}
