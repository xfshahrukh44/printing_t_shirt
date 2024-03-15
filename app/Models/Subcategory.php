<?php

namespace App\Models;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subcategories';

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
    protected $fillable = ['category', 'subcategory', 'image'];

    public function category ()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function categorys ()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function child_sub_categories ()
    {
        return $this->hasMany(Childsubcategory::class, 'subcategory');
    }


}
