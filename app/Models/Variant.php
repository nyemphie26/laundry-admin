<?php

namespace App\Models;

use BinaryCats\Sku\HasSku;
use BinaryCats\Sku\Concerns\SkuOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variant extends Model
{
    use HasFactory, HasSku;

    protected $guarded = ['id'];
    public $timestamps = true;
    // protected $fillable = [
    //     'name',
    //     'price',
    //     'sku',
    // ];

    protected $casts = [
        'name' => 'string',
        'price' => 'float',
        'sku' => 'string',
    ];

    public function skuOptions() : SkuOptions
    {
        return SkuOptions::make()
            ->from(['label'])
            ->target('name')
            ->using('-')
            ->forceUnique(true)
            ->generateOnCreate(true)
            ->refreshOnUpdate(false);
    }
    
    public function service(){

        return $this->belongsTo(Service::class);
    
    }
}
