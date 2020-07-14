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
            'candidate_first_name'=>$this->candidate_first_name,
            'candidate_last_name'=>$this->candidate_last_name,
            'candidate_other_name'=>$this->candidate_other_name,
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
