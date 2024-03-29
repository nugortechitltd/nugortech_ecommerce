<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    function rel_to_customer() {
        return $this->belongsTo(Customerauth::class, 'customer_id');
    }

    function rel_to_product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    function rel_to_orderproduct() {
        return $this->belongsTo(Orderproduct::class, 'order_id', 'id');
    }
}
