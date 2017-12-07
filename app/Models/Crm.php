<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    protected $table = 'crms';

    public function category()
    {
    	//return $this->belongsTo()
    	return $this->belongsTo(Category::class);
    }

     public function product()
    {
        return $this->belongsTo(SkuProduct::class, 'sku_product_id');
    }
}
