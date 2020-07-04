<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionsResource extends JsonResource
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
            'permission_id'=>$this->permission_id,
            'permisssion_name'=>$this->permisssion_name,
            'updated_by'=>$this->updated_by,
        ];
    }
}
