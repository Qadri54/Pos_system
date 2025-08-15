<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model {
    protected $fillable = ['outlet_id', 'customer_name', 'payment_method', 'status', 'total_price'];

    public function outlet(): BelongsTo {
        return $this->belongsTo(Outlet::class);
    }

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'product_order')
            ->withPivot('quantity', 'sub_total')
            ->withTimestamps();
    }

    // Order.php
    public function productOrders() {
        return $this->hasMany(Product_order::class);
    }


}
