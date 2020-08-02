<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommunicationCentresResource extends JsonResource
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
            'communicationCentre_id'=>$this->communicationCentre_id,
            'name'=>$this->name,
            'contact'=>$this->contact,
            'location'=>$this->location,
            'updated_by'=>$this->updated_by,
        ];
    }
}
