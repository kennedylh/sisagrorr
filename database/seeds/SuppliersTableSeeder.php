<?php

use Illuminate\Database\Seeder;
use App\Supplier;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Supplier::create([
          'name' => 'MercadoOnline',
          'email' => 'fornecedor@gmail.com',
          'phone' => '(39)15845-6344 ',
          'cnpj' => '14.096.486/0001-18',
          'address' => 'Rua dos Alfeneiros nº4'
      ]);
    }
}
