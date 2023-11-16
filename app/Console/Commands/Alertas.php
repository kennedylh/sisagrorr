<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Historical_alert;
use App\Products_entrie;
use Carbon\Carbon;

class Alertas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Alertas:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando verifica datas de vencimento proximas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $searchs = Products_entrie::all();

      $br = new Carbon();
      //$br->subDay(2);
      $count = 0;

      foreach ( $searchs as $search ) {

        if($br->diffInDays($search->data_validade) <= 2 && Historical_alert::where('title', '=', 'Vencimento')->where('product_id', '=', $search->produto_id)->count() == 0){

            $hist_alert = new Historical_alert();
            $hist_alert->product_id = $search->produto_id;
            $hist_alert->title = "Vencimento";
            $hist_alert->description = $search->produtos->titulo.' possui lotes com vencimento proximo!!!';
            $hist_alert->save();

            $response = \Telegram::sendMessage([
            'chat_id' => '-1001437741965.0',
            'text' => '<b>ALERTA DE VENCIMENTO PROXIMO</b>                                                                  '.
            '<b>'.$search->produtos->titulo.'</b> possui lotes com vencimento proximo!!!'.
            '<a href="http://ec2-54-94-153-153.sa-east-1.compute.amazonaws.com/">VERIFICAR</a>',
            'parse_mode' => 'html',
            ]);

        }
      }
    }
}
