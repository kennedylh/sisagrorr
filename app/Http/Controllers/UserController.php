<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Historical_alert;
use Hash;

class UserController extends Controller
{

    public function create(){
      if(Auth::check()){
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');
        return view('users.create', compact('alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function index(){
      if(Auth::check()){
        $user = User::all();
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');

        return view('users.index', compact('user','alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function store(Request $request){

      $this->validate($request, [
        'nome'=>'required|String|min:2',
        'email'=>'required|E-Mail|unique:users',
        'senha'=>'required|String|between:8,16',
        'repetir_senha'=>'required|String|same:senha|between:8,16',
      ]);
      $pass = $request->input('senha');
      $password = Hash::make($pass);

      $user = new User();
      $user->name = $request->input('nome');
      $user->email = $request->input('email');
      $user->password = $password;

      if($user->save()){
        return redirect('users/')->with('alert-success', 'Usuário Cadastrado com Sucesso!!!');
      }

    }

    public function edit($id){
      if(Auth::check()){
        $user = User::find($id);
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');

        return view('users.edit', compact('user', 'id', 'alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function update(Request $request, $id){

      $this->validate($request, [
        'nome'=>'required|String|min:2',
        'email'=>'required|E-Mail',
        'senha'=>'required|String|between:8,16',
        'repetir_senha'=>'required|String|same:senha',
      ]);

      $user = User::all();

    	foreach($user as $u){
    		if($u->email == $request->input('email') AND $u->id != $id){
          return redirect('users/'.$id.'/edit')->with('alert-danger', 'Já existe esse email cadastrado no nosso sistema!!!');
    		}
    	}

      $pass = $request->input('senha');
      $password = Hash::make($pass);

      $user = User::find($id);

      $user->name = $request->input('nome');
      $user->email = $request->input('email');
      $user->password = $password;

      if($user->save()){
        return redirect('users/')->with('alert-success', 'Usuário Atualizado com Sucesso!!!');
      }
    }

    public function destroy($id){
      $user = User::find($id);

      $user->delete();
      return redirect('users/')->with('alert-success', 'Usuário Deletado com Sucesso!!!');
    }

}
