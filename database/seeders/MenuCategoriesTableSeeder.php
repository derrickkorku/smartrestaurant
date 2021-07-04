<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_categories')->delete();
        DB::table('menu_categories')->insert([
            ['id' => 1, 'name'=>'Starters', 'type' =>'food', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 2, 'name'=>'Salad', 'type' =>'food', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 3, 'name'=>'Specials', 'type' =>'food', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 4, 'name'=>'Proud to be Ghanaian', 'type' =>'food', 'is_side_dish' => false, 'is_main_dish' => true],
            ['id' => 5, 'name'=>'Vegetarian Dishes', 'type' =>'food', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 6, 'name'=>'Khebab', 'type' =>'food', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 7, 'name'=>'Main Course', 'type' =>'food', 'is_side_dish' => false, 'is_main_dish' => true],
            ['id' => 8, 'name'=>'Desert', 'type' =>'food', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 9, 'name'=>'Side Dishes', 'type' =>'food', 'is_side_dish' => true, 'is_main_dish' => false],
            ['id' => 10, 'name'=>'Sandwiches & Onlys', 'type' =>'food', 'is_side_dish' => false, 'is_main_dish' => false],

            ['id' => 11, 'name'=>'Wisky', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 12, 'name'=>'Brandy', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 13, 'name'=>'Vodka', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 14, 'name'=>'Gin', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 15, 'name'=>'Liquor', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 16, 'name'=>'Local Gin', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 17, 'name'=>'Rhum', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 18, 'name'=>'Beer', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 19, 'name'=>'Cyder', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 20, 'name'=>'Water', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 21, 'name'=>'Soft Drinks', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 22, 'name'=>'Juices', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 23, 'name'=>'Tall Horse Wine', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],
            ['id' => 24, 'name'=>'Non Alcoholic Drinks', 'type' =>'drink', 'is_side_dish' => false, 'is_main_dish' => false],

            ['id' => 25, 'name'=>'Food Inventory', 'type' =>'food', 'is_side_dish' => false, 'is_main_dish' => false],
        ]);
    }
}
