<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ServiceResource extends JsonResource
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
            'picture'       => $this->product_image ? Storage::url($this->product_image) : null,
            'service_name'  => $this->name,
            'slug'          => $this->slug,
            'category'      => $this->category->name,
            'variants'      => VariantResource::collection($this->variants),
            'description'   => $this->description
        ];
        // return [
        //     'success'   => $this->status,
        //     'message'   => $this->message,
        //     'data'      => $this->resource
        // ];
    }
}
