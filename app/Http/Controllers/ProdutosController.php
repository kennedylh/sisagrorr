<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Produtos;
use App\Categories;
use App\Historical_alert;
use App\Events\RegisterProduct;

class ProdutosController extends Controller
{
    //
    public function index(){
      if(Auth::check()){
        $produtos = Produtos::paginate(6);
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');

        return view('produtos.index', array('produtos'=> $produtos, 'buscar' => null, 'alerts_count'=>$alerts_count));
      }else{
        return redirect('login');
      }
    }

    public function show($id){
      $produto = Produtos::find($id);
    return view('produtos.show', array('produto'=> $produto));
    }

    public function create(){
      if(Auth::check()){
        $categories = Categories::all();
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');
        return view('produtos.create', compact('categories', 'alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function store(Request $request){
      $this->validate($request, [
        'titulo'=>'required|min:3|unique:produtos,titulo',
        'descricao'=>'required|min:3|max:50',
        'unidade_medida'=>'required|string',
        'categoria'=>'required',
      ]);

      $produto = new Produtos();
      $produto->titulo = $request->input('titulo');
      $produto->descricao = $request->input('descricao');
      $produto->unidade_medida = $request->input('unidade_medida');
      $produto->categoria_id = $request->input('categoria');

      if($produto->save()){

        // Dispatching Event
        event(new RegisterProduct($produto));

        return redirect('produtos/')->with('alert-success', 'Produto Cadastrado com Sucesso!!!');
      }
    }

    public function edit($id){
      if(Auth::check()){
        $categories = Categories::all();
        $produto = Produtos::find($id);
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');
        /*
        if(Gate::denies('update-produto', $produto)){
            abort(403, 'Unauthorized');
        }
        */
      return view('produtos.edit', compact('produto', 'id', 'categories', 'alerts_count'));

      }else{
        return redirect('login');
      }
    }

    public function update(Request $request, $id){

      $produto = Produtos::find($id);

      //$this->authorize('update-produto', $produto);
      /*
      if(Gate::denies('update-produto', $produto)){
          abort(403, 'Unauthorized');
      }
      */
      $this->validate($request, [
        'titulo'=>'required|min:3',
        'descricao'=>'required|min:3',
        'unidade_medida'=>'required|string',
      ]);

      $produto->titulo = $request->get('titulo');
      $produto->descricao = $request->get('descricao');
      $produto->unidade_medida = $request->get('unidade_medida');

      if($produto->save()){
        // Dispatching Event
        //event(new RegisterProduct($produto));

        return redirect('produtos/')->with('alert-success', 'Produto Atualizado com Sucesso!!!');
      }
    }

    public function destroy($id){
      $produto = Produtos::find($id);

      $produto->delete();
      //return redirect()->back()->with('success', 'Produto Deletado com Sucesso!!!');original
      return redirect('produtos')->with('alert-success', 'Produto Deletado com Sucesso!!!');//modificado
      //return redirect('produtos');
    }

    public function busca(Request $request){
      $alerts_count = Historical_alert::all()->count('id');

      $buscaInput = $request->input('busca');
        $produtos = Produtos::where( 'titulo', 'LIKE', '%'.$buscaInput.'%')->paginate(6);
                  #->orwhere('descricao', 'LIKE', '%'.$request->input('busca').'%')


        return view('produtos.index', array('produtos'=> $produtos, 'buscar' => $buscaInput, 'alerts_count'=> $alerts_count));
    }

    public function rolesPermissions(){
        $nameUser = auth()->user()->name;
        echo ("<h1>{$nameUser}</h1>");

        foreach(auth()->user()->roles as $role){
            echo "<b>$role->name </b>-> ";

            $permissions = $role->permissions;

            foreach($permissions as $permission){
                  echo " $permission->name ,";
            }

            echo '<hr>';
        }

    }


}
