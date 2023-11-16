<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsOutput extends Model
{
  public function product(){
      return $this->belongsTo('App\Produtos');
  }
}
