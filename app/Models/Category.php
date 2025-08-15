<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model {
    protected $fillable = ['id', 'outlet_id', 'name'];

    public function outlet(): BelongsTo {
        return $this->belongsTo(Outlet::class);
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }

}
