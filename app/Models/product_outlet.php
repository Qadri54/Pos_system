<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_outlet extends Model
{
    protected $table = 'product_outlets';
    protected $fillable = ['outlet_id','product_id'];
}
