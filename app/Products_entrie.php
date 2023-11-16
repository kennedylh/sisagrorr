<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produtos;

class Products_entrie extends Model
{
  protected $fillable = ['titulo','quantidade', 'supplier_id', 'qtd_entrada'];

  public function produtos(){
      return $this->belongsTo('App\Produtos', 'produto_id', 'id');
  }

  public function supplier(){
      return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
  }
}
