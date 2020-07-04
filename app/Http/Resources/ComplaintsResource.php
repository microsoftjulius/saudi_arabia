<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintsResource extends JsonResource
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
            'complaint_id'=>$this->complaint_id,
            'complaint_type'=>$this->complaint_type,
            'complaint_details'=>$this->complaint_details,
            'reported_date'=>$this->reported_date,
            'resolved_date'=>$this->resolved_date,
            'reported_time'=>$this->reported_time,
            'complaint_status'=>$this->complaint_status,
            'evidence'=>$this->evidence,
            'updated_by'=>$this->updated_by,
        ];
    }
}
