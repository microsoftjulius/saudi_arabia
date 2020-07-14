<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployersResource extends JsonResource
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
            'employer_first_name'=>$this->employer_first_name,
            'employer_last_name'=>$this->employer_last_name,
            'employer_other_name'=>$this->employer_other_name,
            'contact'=>$this->contact,
            'address'=>$this->address,
            'updated_by'=>$this->updated_by,
        ];
    }
}
