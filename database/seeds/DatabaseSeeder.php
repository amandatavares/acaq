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
<<<<<<< HEAD
        $this->call(UsersTableSeeder::class);
=======
        $this->call('UsersTableSeeder');
>>>>>>> 84b4c270ac2564956a9b6fda8208c0aaadc63f8d
        $this->call('CategoriesTableSeeder');
    }
}
