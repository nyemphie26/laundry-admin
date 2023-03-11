<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class TrackerResource extends JsonResource
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
            'status'    => $this->status,
            'image'     => $this->image_path ? Storage::url($this->image_path) : null,
            'date'      => $this->created_at,
        ];
    }
}
