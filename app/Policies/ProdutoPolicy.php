<?php

namespace App\Policies;
use App\Produtos;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProdutoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function updateProduto(User $user, Produtos $produto){
        return $user->id == $produto->user_id;
    }
    /*
    public function before(){

    }
    */
}
