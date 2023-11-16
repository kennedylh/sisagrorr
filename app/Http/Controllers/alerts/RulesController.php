<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Alert;
use App\Historical_alert;
use App\Produtos;

class RulesController extends Controller
{

    public function index(){
      if(Auth::check()){
        $alerts = Alert::paginate(6);
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');

        return view('alerts.rules.index', compact('alerts', 'alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function create(){
      if(Auth::check()){
        $products = Produtos::all();
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');

        return view('alerts.rules.create', compact('products', 'alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function store(Request $request){
      $this->validate($request, [
        'produto'=>'required|numeric',
        'estoque_min'=>'required|numeric',
      ]);

      $alert = new Alert();
      $alert->product_id = $request->input('produto');
      $alert->stock_min = $request->input('estoque_min');

      if($alert->save()){
        return redirect('alerts/rules')->with('alert-success', 'Alerta Cadastrado com Sucesso!!!');
      }
    }
    public function edit($id){
      if(Auth::check()){
        $alerts = Alert::find($id);
        $products = Produtos::all();
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');

        return view('alerts.rules.edit', compact('alerts', 'id', 'products', 'alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function update(Request $request, $id){

      $alert = Alert::find($id);

      $this->validate($request, [
        'produto'=>'required|numeric',
        'estoque_min'=>'required|numeric'
      ]);

      $alert->product_id = $request->get('produto');
      $alert->stock_min = $request->get('estoque_min');

      if($alert->save()){
        return redirect('alerts/rules')->with('alert-success', 'Alerta Atualizado com Sucesso!!!');
      }

    }
    public function destroy($id){
      $alert = Alert::find($id);

      $alert->delete();

      return redirect('alerts/rules')->with('alert-success', 'Alerta Deletado com Sucesso!!!');
    }

}
