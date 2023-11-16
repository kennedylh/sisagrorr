<?php

use Illuminate\Database\Seeder;
use App\Produtos;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Produtos::create([
          'categoria_id' => '3',
          'titulo' => 'Milho',
          'descricao' => 'Tipo ab3',
          'quantidade_total' => '20',
          'unidade_medida' => 'quilogramas',
      ]);

      Produtos::create([
          'categoria_id' => '3',
          'titulo' => 'Soja',
          'descricao' => 'Tipo ab4',
          'quantidade_total' => '20',
          'unidade_medida' => 'quilogramas',
      ]);
    }
}
