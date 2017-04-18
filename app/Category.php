<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function products(){
      return $this->hasMany('App\Product');
    }
    public function subCategories(){
      return $this->hasMany('App\SubCategory');
    }
    public function homeCategoryProducts($id){
      return Product::where('category_id', '=', $id)->limit(6)->get();
    }
}
