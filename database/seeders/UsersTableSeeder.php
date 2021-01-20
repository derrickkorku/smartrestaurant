<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
          ['id' => 1, 'name' => 'Admin', 'email' => 'admin@email.com', 'password' => Hash::make('admin123')],
          ['id' => 2, 'name' => 'Waiter', 'email' => 'waiter@email.com', 'password' => Hash::make('waiter123')],
          ['id' => 3, 'name' => 'Kitchen Staff', 'email' => 'kitchen@email.com', 'password' => Hash::make('kitchen123')],
          ['id' => 4, 'name' => 'Bar Staff', 'email' => 'bar@email.com', 'password' => Hash::make('bar123')],
        ]);
    }

}
