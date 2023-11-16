<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Categories;
use App\Supplier;
use App\User;
use App\Products_entrie;
use App\ProductsOutput;
use App\Historical_alert;
use App\Charts\SampleChart;
use App\Charts\DashboardChart;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $itens = Produtos::all()->count('id');

      $user = User::all()->count('id');

      $suppliers = Supplier::all()->count('id');

      $categories = Categories::all()->count('id');

      $alerts_count = Historical_alert::whereNull('read_in')->count('id');

      $br = new Carbon();

      //dd($br->Weekday(3)->format('Y-m-d'.' 00:00:00'));
      //$week[x] = Products_entrie::whereDate( 'created_at', '=', $br->Weekday(1)->format('Y-m-d'.' 00:00:00'))->count('id');
      $week = array();
      $x = 6;

      while($x >= 0){
        $entries[$x] = Products_entrie::whereDate( 'created_at', '=', $br->Weekday($x)->format('Y-m-d'.' 00:00:00'))->count('id');
        $outputs[$x] = ProductsOutput::whereDate( 'created_at', '=', $br->Weekday($x)->format('Y-m-d'.' 00:00:00'))->count('id');
        $x--;
      }

      //var_dump($week);
      //dd($br->Weekday(2)->format('Y-m-d'));
      $chart = new DashboardChart;
      $chart->labels(['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira','Sexta-feira', 'Sábado']);
      $chart->dataset('Entradas', 'bar', [$entries[0], $entries[1], $entries[2], $entries[3], $entries[4], $entries[5], $entries[6]])->color('green');
      $chart->dataset('Saídas', 'bar', [$outputs[0], $outputs[1], $outputs[2], $outputs[3], $outputs[4], $outputs[5], $outputs[6]])->color('blue');
      $chart->title("Entradas/Saídas");
      $chart->spaceRatio(0.50);

      return view('home', compact('itens','user', 'suppliers', 'categories', 'alerts_count', 'chart'));

    }


}
