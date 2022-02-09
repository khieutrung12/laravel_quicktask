<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'tbl_product';
    
    protected $fillable = [
        'brand_id',
        'product_name',
        'product_price',
        'product_image',
    ];
}
