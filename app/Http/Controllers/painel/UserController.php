<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
  private $user;

  public function __construct(User $user){
      $this->user = $user;
  }

  public function index(){
      $users = $this->user->all();
      return view('painel.users.index', compact('users'));
  }
}
