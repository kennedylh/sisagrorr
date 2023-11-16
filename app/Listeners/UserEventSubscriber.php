<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Historical_alert;
use Carbon\Carbon;
use App\Products_entrie;
use Telegram\Bot\Api;

class UserEventSubscriber
{
  /**
   * Handle user login events.
   */
  public function onUserLogin($event)
  {
      $br = new Carbon();
      //dd($br->format('Y-m-d'));
      $search = Historical_alert::where('title', '=', 'vencimento')->whereNull('read_in')->count();

      if($search > 0){
        return redirect('/')->
        with(
          'alert-toastr',
          'Existem '.$search.' produto(s) com vencimento proximo!!!'
        );
      }
  }


  /**
   * Handle user logout events.
   */
  public function onUserLogout($event)
  {
      // Se quiser implementar algo pós logout é neste estágio
      //dd('Logout');
  }


  /**
   * Register the listeners for the subscriber.
   *
   * @param  Illuminate\Events\Dispatcher  $events
   */
  public function subscribe($events)
  {
      $events->listen(
          'Illuminate\Auth\Events\Login',
          'App\Listeners\UserEventSubscriber@onUserLogin'
      );

      $events->listen(
          'Illuminate\Auth\Events\Logout',
          'App\Listeners\UserEventSubscriber@onUserLogout'
      );
  }
}
