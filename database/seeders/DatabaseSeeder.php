<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WarehouseSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MenuCategoriesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
    }
}
