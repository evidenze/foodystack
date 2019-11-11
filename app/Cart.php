<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'name', 'prize', 'quantity', 'session_id', 'product_id'
    ];

    protected $table = 'cart';
}
