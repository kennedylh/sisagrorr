<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission){
        $this->permission = $permission;
    }

    public function index(){
        $permissions = $this->permission->all();
        return view('painel.permissions.index', compact('permissions'));
    }

    public function roles($id){
        //recuperar a permission
        $permission = $this->permission->find($id);

        //recuperar permissoes
        //$permissions = $role->permissions();
        $roles = $permission->roles()->get();
        
        return view('painel.permissions.roles', compact('permission', 'roles'));
    }
}
