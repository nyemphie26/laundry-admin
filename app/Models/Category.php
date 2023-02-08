<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function services(){

        return $this->hasMany(Service::class);
    
    }

    public function variants(){
        return $this->hasManyThrough(Variant::class, Service::class);
    }
}
