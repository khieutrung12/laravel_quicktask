<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'tbl_brand';

    protected $fillable = [
        'brand_name',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
