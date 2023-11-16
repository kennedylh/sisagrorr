<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Produtos;
use App\Permission;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
  public function index(){
          if(Auth::check()){

            $totalUsers = User::count();
            $totalRoles = Role::count();
            $totalPermissions = Permission::count();
            $totalProdutos = Produtos::count();

            return view('painel.home.index', compact('totalUsers', 'totalRoles', 'totalPermissions', 'totalProdutos'));
          }else{
            return redirect('login');
        }
    }
}
