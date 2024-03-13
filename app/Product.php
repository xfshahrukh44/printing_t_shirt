<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_title',
        'description',
        'price',
        'price2',
        'price3',
        'price4',
        'size',
        'in_stock',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function categorys()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function attributes()
    {
        return $this->hasMany('App\ProductAttribute', 'product_id', 'id');
    }

}
