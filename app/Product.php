<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code_of_Product',
        'type_of_Product',
        'price'
    ];
}
