<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'sku'       => $this->sku,
            'name'      => $this->item,
            'qty'       => $this->qty,
            'price'     => $this->price,
            'subtotal'  => $this->subtotal
        ];
    }
}
