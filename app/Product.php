<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seller;
class Product extends Model
{
    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function sellers(){
      return $this->hasMany('App\Seller');
    }

    public function subCategory(){
      return $this->belongsTo('App\SubCategory');
    }
    public function minPrice($id){
      return Seller::where('product_id', '=', $id)->min('price');
    }
}
