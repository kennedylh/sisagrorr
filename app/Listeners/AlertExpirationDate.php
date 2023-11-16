<?php

namespace App\Listeners;

use App\Events\OutputProduct;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class AlertStockMin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  OutputProduct  $event
     * @return void
     */
    public function handle(OutputProduct $event)
    {
      return redirect('/')->with('alert-toastr', 'O item está com estoque baixo!!!');
    }
}
