<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function sellers(){
      return $this->hasMany('App\Seller');
    }

    public function SubCategory(){
      return $this->belongsTo('App\SubCategory');
    }

}
