<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'from'  => $this->hourFrom,
            'until' => $this->hourUntil,
        ];
    }
}
