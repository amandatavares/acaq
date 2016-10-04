<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
          'name' => 'Animais',
      ]);
      DB::table('categories')->insert([
          'name' => 'Tecnologia',
      ]);
      DB::table('categories')->insert([
          'name' => 'Saúde',
      ]);
      DB::table('categories')->insert([
          'name' => 'Artes e entretenimento',
      ]);
      DB::table('categories')->insert([
          'name' => 'Lazer',
      ]); 
      DB::table('categories')->insert([
          'name' => 'Compras e vendas',
      ]);  
      DB::table('categories')->insert([
          'name' => 'Viagens e turismo',
      ]);      
      DB::table('categories')->insert([
          'name' => 'Família e relacionamentos',
      ]);
      DB::table('categories')->insert([
          'name' => 'Outros',
      ]);
      DB::table('categories')->insert([
          'name' => 'Empregos',
      ]);
      DB::table('categories')->insert([
          'name' => 'Causas humanitárias',
      ]);
      DB::table('categories')->insert([
          'name' => 'Achados e perdidos',
      ]);
      DB::table('categories')->insert([
          'name' => 'Ofertas e descontos',
      ]);
      DB::table('categories')->insert([
          'name' => 'Religião e espiritualidade',
      ]);
      DB::table('categories')->insert([
          'name' => 'Notícias e eventos',
      ]);
    }

    public function down()
    {
      DB::table('categories')->delete();
    }
}
