<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
  public function produtos(){
      return $this->belongsTo('App\Produtos', 'product_id', 'id');
  }
}
