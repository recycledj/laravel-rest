<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [ 'name', 'SKU', 'description', 'value', 'path', 'store_id' ];
}
