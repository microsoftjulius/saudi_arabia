<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParentsResource extends JsonResource
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
            'parent_first_name'=>$this->parent_first_name,
            'parent_last_name'=>$this->parent_last_name,
            'parent_other_name'=>$this->parent_other_name,
            'contact'=>$this->contact,
            'address'=>$this->address,
            'updated_by'=>$this->updated_by,
        ];
    }
}
