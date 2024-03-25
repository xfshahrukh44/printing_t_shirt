<?php

namespace App;

use App\Models\ProductPrice;
use Carbon\Carbon;
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
        'additional_information',
        'category',
        'subcategory',
        'childsubcategory',
        'image',
        'price',
        'price2',
        'price3',
        'price4',
        'size',
        'in_stock',
        'product_download_expiry',
        'zip',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function categorys()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function childsubcategorys()
    {
        return $this->belongsTo('App\Models\Childsubcategory', 'childsubcategory', 'id');
    }

    public function attributes()
    {
        return $this->hasMany('App\ProductAttribute', 'product_id', 'id');
    }

    public function can_download_product ($order_id) {
        $order = orders::where('id',$order_id)->first();

        return (bool) (
            !is_null($order->completed_at) &&
            (Carbon::parse($order->completed_at)->addHours($this->product_download_expiry) >= Carbon::now())
        );
    }

    public function product_prices ()
    {
        return $this->hasMany(ProductPrice::class, 'product_id');
    }

}
