<?php

namespace App\Http\Controllers\painel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
  private $role;

  public function __construct(Role $role){
      $this->role = $role;
  }

  public function index(){
      $roles = $this->role->all();
      return view('painel.roles.index', compact('roles'));
  }

  public function edit($id){
    if(Auth::check()){
      $role_user = $this->role->all();

      //dd($role_user);
      return view('painel.users_roles.index', compact('role_user'));
    }else{
      return redirect('login');
    }
  }

  public function permissions($id){
      //recuperar o role
      $role = $this->role->find($id);

      //recuperar permissoes
      //$permissions = $role->permissions();
      $permissions = $role->permissions();

      return view('painel.roles.permissions', compact('role', 'permissions'));
  }
}
