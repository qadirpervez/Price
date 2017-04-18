<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
  public function product(){
    return $this->belongsTo('App\Product');
  }
  public function sellerData(){
    return $this->belongsTo('App\SellerData');
  } 
}
