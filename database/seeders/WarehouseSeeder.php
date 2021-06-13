<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->delete();
        DB::table('warehouses')->insert([
            ['id' => 1, 'name' => 'Inside Plane'],
            ['id' => 2, 'name' => 'Under Plane'],
            ['id' => 3, 'name' => 'Main']
        ]);
    }
}
