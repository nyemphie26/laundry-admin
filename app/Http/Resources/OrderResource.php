<?php

namespace App\Http\Resources;

use App\Models\Delivery;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_no'      => $this->order_no,
            'total'         => $this->total,
            'tax'           => $this->tax,
            'grand_total'   => $this->grand_total,
            'items'         => OrderDetailResource::collection($this->details),
            'schedules'     => ScheduleResource::collection($this->schedules),
            'delivery'      => new DeliveryResource($this->delivery), //resource
            'trackers'      => TrackerResource::collection($this->trackers)
        ];
    }
}
