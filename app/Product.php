<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['category_id','subcategory_id','name','description',];
    public function category()
    {
        //dd($this);
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcategory()
    {
        //dd($this);
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }

}
