<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class user_outlet extends Model {
    protected $fillable = [
        'user_id',
        'outlet_id',
    ];
    public function outlet(): BelongsToMany {
        return $this->belongsToMany(Outlet::class, 'user_outlet', 'user_id', 'outlet_id')->withTimestamps();
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_outlet')->withTimestamps();
    }

}
