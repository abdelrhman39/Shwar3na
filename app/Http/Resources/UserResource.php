<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Manage\BaseController;
use App\Models\UserRole;

class UserResource extends JsonResource
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
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "image" => BaseController::getImageUrl("users" , $this->image),
            "roles" => UserRole::select("id" ,"type")->where('user_id' , $this->id)->get(),
            "token" => $this->userToken,
            "created_at" => $this->created_at,
        ];
    }
}
