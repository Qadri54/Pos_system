<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model {
    protected $fillable = ['outlet_id', 'user_id', 'data'];

    public function outlet(): BelongsTo {
        return $this->belongsTo(Outlet::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
