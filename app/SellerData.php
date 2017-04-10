<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerData extends Model
{
    public function allSellers(){
      return $this->hasMany('App\Seller');
    }
}
