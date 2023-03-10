<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OffDayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public $preserveKeys = false;

    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "date" => $this->date,
        ];
    }
}
