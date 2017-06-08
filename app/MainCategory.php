<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    public function Categories(){
      return $this->hasMany('App\Category');
    }
    public function ProductsHome($id){
      return Product::where('main_category_id', '=', $id)->limit(8)->get();
    }
    public function Products(){
      return $this->hasMany('App\Product');
    }
}
