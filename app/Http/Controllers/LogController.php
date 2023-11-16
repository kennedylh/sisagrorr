<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Log;
use App\Historical_alert;

class LogController extends Controller
{
    //
    public function index(){
      if(Auth::check()){
        $logs = Log::paginate(6);
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');

        return view('logs.index', compact('logs', 'alerts_count'));
      }else{
        return redirect('login');
      }
    }

}
