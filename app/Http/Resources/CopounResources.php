<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Manage\BaseController;

class CopounResources extends JsonResource
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
            "text" => $this->text,
            "title" => $this->title,
            "image" => BaseController::getImageUrl("places" , $this->image),
            "code" => $this->code,
            "old_price" => $this->old_price,
            "new_price" => $this->new_price,
            "expired_date" => $this->expired_date,
            "used" => $this->used,
            "created_at" => $this->created_at,
        ];
    }
}
