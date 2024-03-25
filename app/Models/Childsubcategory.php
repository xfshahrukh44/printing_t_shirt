<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Childsubcategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'childsubcategories';

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
    protected $fillable = ['subcategory', 'childsubcategory'];

    public function sub_category ()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory');
    }

    public function sub_categorys ()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'childsubcategory', 'id');
    }


}
