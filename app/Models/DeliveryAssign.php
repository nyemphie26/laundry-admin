<?php

namespace App\Models;

use App\Enums\Assignstatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAssign extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
