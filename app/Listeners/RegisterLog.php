<?php

namespace App\Listeners;

use App\Events\RegisterProduct;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Log;

class RegisterLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisterProduct  $event
     * @return void
     */
    public function handle(RegisterProduct $event)
    {
        //dd($event);
        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = auth()->user()->name." registrou o produto ". $event->product->titulo;
        $log->save();
    }
}
