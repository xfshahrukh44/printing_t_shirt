<?php

namespace App\Models;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable = [
        'product_id',
        'min',
        'max',
        'rate',
    ];

    public function product ()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
