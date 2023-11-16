<?php

use Illuminate\Database\Seeder;
use App\Products_entrie;

class ProductsEntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Products_entrie::create([
          'produto_id' => '1',
          'montante' => '25',
          'data_validade' => '2019-05-13',
          'qtd_entrada' => '20',
          'user_id' => '1',
          'supplier_id' => '1'
      ]);

      Products_entrie::create([
          'produto_id' => '2',
          'montante' => '25',
          'data_validade' => '2019-05-13',
          'qtd_entrada' => '20',
          'user_id' => '1',
          'supplier_id' => '1'
      ]);
    }
}
