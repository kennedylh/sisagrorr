<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleUserController extends Controller
{
  private $role;

  public function __construct(Role $role){
      $this->role = $role;
  }

  public function index(){
      $roles = $this->role->all();
      return view('painel.roles.index', compact('roles'));
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
