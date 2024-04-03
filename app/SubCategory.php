<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable=['name','description','category_id'];
public function category()
{
    //dd($this);
    return $this->belongsTo(Category::class,'category_id','id');
}
}
