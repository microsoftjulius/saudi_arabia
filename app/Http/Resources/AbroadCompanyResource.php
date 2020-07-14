<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AbroadCompanyResource extends JsonResource
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
            'company_name'=>$this->company_name,
            'contract'=>$this->contract,
            'location'=>$this->location,
            'job_types'=>$this->job_types,
            'visa_number'=>$this->visa_number,
            'visa_date'=>$this->visa_date,
            'signature'=>$this->signature,
            'updated_by'=>$this->updated_by,
        ];
    }
}
