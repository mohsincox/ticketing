<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkuProduct extends Model
{
    protected $table = 'sku_products';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
