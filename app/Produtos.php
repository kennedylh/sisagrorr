<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    /*
    public function user(){
      return $this->belongsTo(User::class, 'user_id');//retorna a interação entre as tabelas
    }
    */
    protected $fillable = ['name','quantidade_total'];

    public function category(){
        return $this->belongsTo('App\Categories', 'categoria_id', 'id');
    }
}
