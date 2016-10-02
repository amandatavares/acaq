<?php

use App\User;
use Illuminate\Database\Seeder;
use database\seeds\CategoriesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call('CategoriesTableSeeder');
    }
}
