<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'tbl_brand';

    protected $fillable = [
        'brand_name',
    ];
}
