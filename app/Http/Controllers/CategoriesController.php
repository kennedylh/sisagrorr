<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Historical_alert;
use App\Produtos;

class CategoriesController extends Controller
{
    //
    public function index(){
      if(Auth::check()){
        $categories = Categories::paginate(6);
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');
        return view('categorias.index', compact('categories', 'alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function create(){
      if(Auth::check()){
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');
        return view('categorias.create', compact('alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function store(Request $request){
      $this->validate($request, [
        'categoria'=>'required|min:4',
      ]);
      $categories = new Categories();
      $categories->name = $request->input('categoria');

      if($categories->save()){
        return redirect('categories/')->with('alert-success', 'Categoria Cadastrada com Sucesso!!!');
      }
    }

    public function edit($id){
      if(Auth::check()){
        $categories = Categories::find($id);
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');
        return view('categorias.edit', compact('categories', 'id', 'alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function update(Request $request, $id){
      $categories = Categories::find($id);

      $this->validate($request, [
        'categoria'=>'required|min:4',
      ]);

      $categories->name = $request->get('categoria');

      if($categories->save()){
        return redirect('categories/')->with('alert-success', 'Categoria Atualizada com Sucesso!!!');
      }
    }

    public function destroy($id){
        $search = Produtos::where('categoria_id', '=', $id)->count('id');

        if($search > 0){
            return redirect('categories/')->with('alert-error', 'Categoria em uso, não é possível Deletar!!!');
        }

      $categories = Categories::find($id);
      $categories->delete();
      return redirect('categories/')->with('alert-success', 'Categoria Deletada com Sucesso!!!');
    }

}
