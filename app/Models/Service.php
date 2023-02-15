<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = [
    //     'name',
    //     'slug',
    //     'price',
    //     'product_image',
    //     'category_id',
    //     'description'
    // ];
    
    protected $guarded = 'id';
    
    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function variants(){

        return $this->hasMany(Variant::class);

    }

}
