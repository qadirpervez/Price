<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    public function Categories(){
      return $this->hasMany('App\Category');
    }
}
