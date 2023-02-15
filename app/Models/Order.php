<?php

namespace App\Models;

use BinaryCats\Sku\HasSku;
use BinaryCats\Sku\Concerns\SkuOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, HasSku;

    protected $guarded = 'id';

    public function skuOptions() : SkuOptions
    {
        return SkuOptions::make()
            ->from(['user_id', 'total'])
            ->target('order_no')
            ->using('_')
            ->forceUnique(true)
            ->generateOnCreate(true)
            ->refreshOnUpdate(false);
    }
    
    public function details()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public function assigns()
    {
        return $this->hasMany(OrderAssign::class);
    }

    public function trackers()
    {
        return $this->hasMany(OrderTracker::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}

