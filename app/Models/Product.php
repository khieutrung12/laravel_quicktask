<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
