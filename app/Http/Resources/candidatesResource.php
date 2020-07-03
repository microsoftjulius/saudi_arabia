<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class candidatesResource extends JsonResource
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
            'candidate_id'=>$this->candidate_id,
            'employer_id'=>$this->employer_id,
            'parent_id'=>$this->parent_id,
            'abroadCompany_id'=>$this->abroadCompany_id,
            'UGCompany_id'=>$this->UGCompany_id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'other_name'=>$this->other_name,
            'date_of_birth'=>$this->date_of_birth,
            'place_of_birth'=>$this->place_of_birth,
            'next_of_kin'=>$this->next_of_kin,
            'occupation'=>$this->occupation,
            'education_level'=>$this->education_level,
            'contact'=>$this->contact,
            'consent_letter'=>$this->consent_letter,
            'updated_by'=>$this->updated_by,
        ];
    }
}
