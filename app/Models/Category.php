<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

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
