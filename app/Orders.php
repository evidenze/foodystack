<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'address', 'quantity', 'prize', 'user_id', 'name', 'product_id'
    ];

    protected $table = 'orders';
}
