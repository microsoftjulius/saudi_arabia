<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UgandanCompanyResource extends JsonResource
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
            'UGCompany_id'=>$this->UGCompany_id,
            'company_name'=>$this->company_name,
            'license'=>$this->license,
            'location'=>$this->location,
            'contact'=>$this->contact,
            'email'=>$this->email,
            'updated_by'=>$this->updated_by,
        ];
    }
}
