<?php

namespace App\Models;

use BinaryCats\Sku\HasSku;
use BinaryCats\Sku\Concerns\SkuOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder;

class Order extends Model
{
    use HasFactory, HasSku;

    protected $guarded = ['id'];

    protected $casts = [
        'total' => 'float',
        'tax' => 'float',
        'grand_total' => 'float'
    ];

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

    public function cust()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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

    public function pickupAssign()
    {
        return $this->hasOne(PickupAssign::class);
    }

    public function laundressAssign()
    {
        return $this->hasOne(LaundressAssign::class);
    }

    public function deliveryAssign()
    {
        return $this->hasOne(DeliveryAssign::class);
    }

    public function trackers()
    {
        return $this->hasMany(OrderTracker::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function getPlacedDate(): HasOne
    {
        return $this->hasOne(OrderTracker::class)->ofMany('created_at','min');
    }

    public function getLatestStatus()
    {
        return $this->hasOne(OrderTracker::class)->ofMany('created_at');
    }

    public function pickup(): HasOne
    {
        return $this->hasOne(Schedule::class)->where('status','pickup');
    }

    public function deliveryDate():HasOne
    {
        return $this->hasOne(Schedule::class)->where('status','deliver');
    }
    
}

