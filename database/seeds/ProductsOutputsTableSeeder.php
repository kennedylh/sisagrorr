<?php

use Illuminate\Database\Seeder;
use App\ProductsOutput;

class ProductsOutputsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ProductsOutput::create([
          'amount' => '5',
          'note' => 'fornecimento do campus',
          'date_output' => '2019-05-01',
          'product_id' => '1'
      ]);

      ProductsOutput::create([
          'amount' => '5',
          'note' => 'fornecimento do campus',
          'date_output' => '2019-05-01',
          'product_id' => '2'
      ]);
    }
}
