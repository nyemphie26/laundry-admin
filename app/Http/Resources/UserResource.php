<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'full_name'     => $this->getFullNameAttribute(),
            'first_name'    => $this->name,
            'last_name'     => $this->last_name,
            'phone'         => $this->phone,
            'email'         => $this->email,
            'picture'       => $this->avatar_path,
            'address'       => $this->address,
        ];
    }
}
