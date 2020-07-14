<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SolutionsResource extends JsonResource
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
            'solution_name'=>$this->solution_name,
            'reg_code'=>$this->reg_code,
            'final_report_print_out'=>$this->final_report_print_out,
            'updated_by'=>$this->updated_by,
        ];
    }
}
