<?php

use Illuminate\Database\Seeder;
use App\Categories;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Categories::create([
          'name' => 'Fertilizantes',
      ]);

      Categories::create([
          'name' => 'Agrotóxico',
      ]);

      Categories::create([
          'name' => 'Perecível',
      ]);

    }
}
