<?php

namespace App\Listeners;

use App\Events\OutputProduct;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Alert;
use App\Historical_alert;
use Telegram\Bot\Api;
use Carbon\Carbon;

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
    { //dd($event);
          $id = $event->product->id;

          $name = $event->product->titulo;
          $amount = $event->product->quantidade_total;

          //se o produto não possuir nenhuma regra de alerta --- sair
          if(!Alert::where('product_id', '=', $id)->exists()){
            return null;
          }

          $alert = Alert::where('product_id', '=', $id)->get();

          $stock_min = $alert[0]->stock_min;

              if($amount <= $stock_min){

                $update = Historical_alert::where('title','Estoque Baixo')
                ->whereNull('read_in')->where('product_id', '=', $alert[0]->id)
                ->first();

                $date = new Carbon();

                if($update){
                    $hist_alert = Historical_alert::find($update->id);
                    $hist_alert->product_id = $alert[0]->id;
                    $hist_alert->created_at = $date->format('Y-m-d H:i:s');
                    $hist_alert->title = "Estoque Baixo";
                    $hist_alert->description = $name.' está com estoque baixo!!!';
                }else{
                    $hist_alert = new Historical_alert();
                    $hist_alert->product_id = $alert[0]->id;
                    $hist_alert->title = "Estoque Baixo";
                    $hist_alert->description = $name.' está com estoque baixo!!!';
                }

                if($hist_alert->save()){

                  $response = \Telegram::sendMessage([
                  'chat_id' => '-1001437741965.0',
                  'text' => '<b>ALERTA DE ESTOQUE BAIXO</b>                                                                  '.
                  '<b>Produto: </b><b>'.$name.'</b>                                                            '.
                  '<b>Alerta definido para: </b><b>'.$stock_min.' '.$event->product->unidade_medida.'</b>                                                          '.
                  '<b>Estoque total: </b>'.'<b>'. $amount.' '.$event->product->unidade_medida.'</b>                                                                '.
                  '<b>Quantidade retirada: </b>'.'<b>'.$event->qtd.' '.$event->product->unidade_medida.'</b>                                                               '.
                  '<a href="http://ec2-54-94-153-153.sa-east-1.compute.amazonaws.com/">VERIFICAR</a>',
                  'parse_mode' => 'html',
                  ]);

                  return redirect('/')->with('alert-toastr', 'O produto '.$name.' está com estoque baixo!!!');
                }
              }
    }
}
