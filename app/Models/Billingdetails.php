<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billingdetails extends Model
{
    use HasFactory;

    function rel_to_order() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    function rel_to_customer() {
        return $this->belongsTo(Customerauth::class, 'customer_id');
    }
}
