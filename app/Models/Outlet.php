<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Outlet extends Model {
    protected $fillable = ['id', 'outlet_name', 'address'];


    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_outlet')->withTimestamps();
    }

    public function categories(): HasMany {
        return $this->hasMany(Category::class);
    }

    public function products(): BelongsToMany {
        return $this->BelongsToMany(Product::class);
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }

    public function histories(): HasMany {
        return $this->hasMany(History::class);
    }

}
