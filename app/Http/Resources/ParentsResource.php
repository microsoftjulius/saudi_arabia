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
            'parent_id'=>$this->parent_id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'other_name'=>$this->other_name,
            'contact'=>$this->contact,
            'address'=>$this->address,
            'updated_by'=>$this->updated_by,
        ];
    }
}
