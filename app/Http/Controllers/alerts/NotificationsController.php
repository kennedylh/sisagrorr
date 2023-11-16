<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Historical_alert;
use Carbon\Carbon;

class NotificationsController extends Controller
{

    public function index(){
      if(Auth::check()){
        $hist_alerts = Historical_alert::paginate(6);
        $alerts_count = Historical_alert::whereNull('read_in')->count('id');

        return view('alerts.notifications.index', compact('hist_alerts', 'alerts_count'));
      }else{
        return redirect('login');
      }
    }

    public function read($id){
        $hist_alerts = Historical_alert::find($id);

        $date = new Carbon();

        $hist_alerts->read_in = $date->format('Y-m-d H:i:s');

        $hist_alerts->save();
        return redirect('/alerts/notifications');
    }

    public function destroy($id){
      $hist_alerts = Historical_alert::find($id);

      $hist_alerts->delete();

      return redirect('alerts/notifications')->with('alert-success', 'Notificação Deletada com Sucesso!!!');
    }
}
