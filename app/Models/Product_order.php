<?php

// app/Models/ProductOrder.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product_order extends Model {
    protected $table = 'product_order';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'sub_total',
    ];

    // Relasi ke Order
    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    // Relasi ke Product
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}

