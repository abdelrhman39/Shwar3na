<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Manage\BaseController;

class JobResources extends JsonResource
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
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "count" => $this->count,
            "email" => $this->email,
            "end_date" => $this->end_date,
            "type" => $this->type,
            "image" => BaseController::getImageUrl("category" , $this->image),
            "requirment_job" => $this->requirment_job,
            "sallary" => $this->sallary,
            "is_active" => $this->is_active,
            "created_at" => $this->created_at,
            
        ];
    }
}
