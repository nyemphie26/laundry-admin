<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAssign extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = true;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}
