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
          'name' => 'Informática',
      ]);
    }

    public function down()
    {
      DB::table('categories')->delete();
    }
}
