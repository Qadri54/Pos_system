<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model {
    protected $fillable = ['product_name', 'price', 'category_id', 'image'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function outlet(): BelongsToMany {
        return $this->belongsToMany(Outlet::class, 'product_outlets', 'product_id', 'outlet_id')
            ->withTimestamps();
    }

    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class, 'product_order')
            ->withPivot('quantity', 'sub_total')
            ->withTimestamps();
    }

    // Product.php
    public function productOrders() {
        return $this->hasMany(Product_order::class);
    }


}
