<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BinaryCats\Sku\HasSku;

class Variant extends Model
{
    use HasFactory, HasSku;

    protected $guarded = 'id';
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

    public function service(){

        return $this->belongsTo(Service::class);
    
    }
}
