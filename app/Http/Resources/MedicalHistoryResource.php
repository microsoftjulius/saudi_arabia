<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalHistoryResource extends JsonResource
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
            'medic_id'=>$this->medic_id,
            'candidate_id'=>$this->candidate_id,
            'premedical_status'=>$this->premedical_status,
            'premedical_status_date'=>$this->premedical_status_date,
            'final_medical_test'=>$this->final_medical_test,
            'predepature_medical_tests'=>$this->predepature_medical_tests,
            'covid19_certificate'=>$this->covid19_certificate,
            'covid19_certificate_date'=>$this->covid19_certificate_date,
            'updated_by'=>$this->updated_by,
        ];
    }
}
