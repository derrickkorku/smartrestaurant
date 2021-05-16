<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->delete();
        DB::table('menus')->insert([
            ['id' => 1, 'name' => 'A.1 Spring Roll', 'menu_category_id' => 1, 'price' => 15],
            ['id' => 2, 'name' => 'A.2 Kelewele', 'menu_category_id' => 1, 'price' => 20],
            ['id' => 3, 'name' => 'A.3 Chicken Wings(3pcs)', 'menu_category_id' => 1, 'price' => 20],
            ['id' => 4, 'name' => 'Tea/Green Tea/illy Coffee', 'menu_category_id' => 1, 'price' => 20],

            ['id' => 5, 'name' => 'A.4 Chicken Salad', 'menu_category_id' => 2, 'price' => 45],
            ['id' => 6, 'name' => 'A.5 Tuna Salad', 'menu_category_id' => 2, 'price' => 45],
            ['id' => 7, 'name' => 'A.6 Beef Salad', 'menu_category_id' => 2, 'price' => 50],
            ['id' => 8, 'name' => 'A.7 Avocado Salad(Seasonal)', 'menu_category_id' => 2, 'price' => 55],
            ['id' => 9, 'name' => 'Vegetable Salad', 'menu_category_id' => 2, 'price' => 40],

            ['id' => 10, 'name' => 'C.1 French Fries with Sandwich', 'menu_category_id' => 3, 'price' => 40],
            ['id' => 11, 'name' => 'C.2 Couscous with Veg and Fish', 'menu_category_id' => 3, 'price' => 60],
            ['id' => 12, 'name' => 'C.3 Spaghetti Chicken In Veg', 'menu_category_id' => 3, 'price' => 53],
            ['id' => 13, 'name' => 'C.4 Spaghetti In Meat Balls Sauce', 'menu_category_id' => 3, 'price' => 53],
            ['id' => 14, 'name' => 'C.5 Corn Beef Stew with Boiled Plantain/Rice/Yam', 'menu_category_id' => 3, 'price' => 53],
            ['id' => 15, 'name' => 'C.6 Grilled Chicken & Acheke & Veg', 'menu_category_id' => 3, 'price' => 65],
            ['id' => 16, 'name' => 'C.7 Grilled Tilapia & Acheke & Veg', 'menu_category_id' => 3, 'price' => 75], ['id' => 17, 'name' => 'C.8 Beef Steak & Acheke & Veg', 'menu_category_id' => 3, 'price' => 75],
            ['id' => 18, 'name' => 'C.9 Guinea & Acheke & Veg', 'menu_category_id' => 3, 'price' => 75],

            ['id' => 19, 'name' => 'D.1 Grilled Tilapia (Fresh Grrinded Pepper)', 'menu_category_id' => 4, 'price' => 55],
            ['id' => 20, 'name' => 'D.2 Okro Soup with Crab/Fish Beef/Goat Meat', 'menu_category_id' => 4, 'price' => 53],
            ['id' => 21, 'name' => 'D.3 Okro Stew (Fish/Beef/Goat Meat)', 'menu_category_id' => 4, 'price' => 53],
            ['id' => 22, 'name' => 'D.4 Goat Soup', 'menu_category_id' => 4, 'price' => 53],
            ['id' => 23, 'name' => 'D.5 Palmnut Soup(Beef/Goat Meat/Fish)', 'menu_category_id' => 4, 'price' => 53],
            ['id' => 24, 'name' => 'D.6 Duck Groundnut', 'menu_category_id' => 4, 'price' => 53],
            ['id' => 25, 'name' => 'D.7 Red Red with Fish/Chicken/Beef', 'menu_category_id' => 4, 'price' => 53], ['id' => 26, 'name' => 'D.8 Palava Sauce(Fish/Chicken/Beef)', 'menu_category_id' => 4, 'price' => 53],
            ['id' => 27, 'name' => 'D.9 Garden Egg Stew (Fish/Chicken/Beef)', 'menu_category_id' => 4, 'price' => 53],
            ['id' => 28, 'name' => 'D.10 Yevugboma (Spinach Sauce) Fish/Beef/Goat Meat', 'menu_category_id' => 4, 'price' => 55],
            ['id' => 29, 'name' => 'D.11 Chicken Lite Soup(Layer)', 'menu_category_id' => 4, 'price' => 55],
            ['id' => 30, 'name' => 'D.12 Chicken Tilapia Soup', 'menu_category_id' => 4, 'price' => 55],

            ['id' => 31, 'name' => 'V.D.1 Local/Foreign Mushroom Saute with Vegetables', 'menu_category_id' => 5, 'price' => 55],
            ['id' => 32, 'name' => 'V.D.2 Vegetable Couscous (Jollof)', 'menu_category_id' => 5, 'price' => 50],
            ['id' => 33, 'name' => 'V.D.3 Garden Eggs Stew with Soya Chunck', 'menu_category_id' => 5, 'price' => 50],
            ['id' => 34, 'name' => 'V.D.4 Spaghetti In Vegetable Sauce', 'menu_category_id' => 5, 'price' => 55],
            ['id' => 35, 'name' => 'V.D.5 Agushi Palava Sauce', 'menu_category_id' => 5, 'price' => 50],
            ['id' => 36, 'name' => 'V.D.6 Veg Only', 'menu_category_id' => 5, 'price' => 20],

            ['id' => 37, 'name' => 'Beef Fillet Khebab', 'menu_category_id' => 6, 'price' => 30],
            ['id' => 38, 'name' => 'Chicken Khebab', 'menu_category_id' => 6, 'price' => 30],
            ['id' => 39, 'name' => 'Goat Khebab', 'menu_category_id' => 6, 'price' => 30],

            ['id' => 40, 'name' => 'B.1 Grilled Chicken', 'menu_category_id' => 7, 'price' => 45],
            ['id' => 41, 'name' => 'B.2 Seasoned Fried Fish(Fillet)', 'menu_category_id' => 7, 'price' => 60],
            ['id' => 42, 'name' => 'B.3 Steamed Tilapia', 'menu_category_id' => 7, 'price' => 55],
            ['id' => 43, 'name' => 'B.4 Beef Steak', 'menu_category_id' => 7, 'price' => 55],
            ['id' => 44, 'name' => 'B.5 Lamb Chops', 'menu_category_id' => 7, 'price' => 55],
            ['id' => 45, 'name' => 'B.7 Guinea Fowl', 'menu_category_id' => 7, 'price' => 55],
            ['id' => 46, 'name' => 'B.8 Boneless Duck in Veg. Sauce', 'menu_category_id' => 7, 'price' => 55], ['id' => 47, 'name' => 'B.9 Shredded Chicken in Veg. Sauce', 'menu_category_id' => 7, 'price' => 53],
            ['id' => 48, 'name' => 'B.10 Eba with (Sadin Sauce/Fried Egg and Grounded Pepper and Shito)', 'menu_category_id' => 7, 'price' => 45],

            ['id' => 49, 'name' => 'Ice Cream', 'menu_category_id' => 8, 'price' => 15],
            ['id' => 50, 'name' => 'Chocolate, Vanilla, Strawbery', 'menu_category_id' => 8, 'price' => 15],
            ['id' => 51, 'name' => 'Pancakes', 'menu_category_id' => 8, 'price' => 15],

            ['id' => 52, 'name' => 'Jollof Rice', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 53, 'name' => 'Plain Rice', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 54, 'name' => 'Fried Rice', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 55, 'name' => 'Fufu', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 56, 'name' => 'Banku', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 57, 'name' => 'Eba / Eba Jollof', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 58, 'name' => 'Gari Fortor', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 59, 'name' => 'Acheke', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 60, 'name' => 'French Fries', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 61, 'name' => 'Potato Saute', 'menu_category_id' => 9, 'price' => 0],

            ['id' => 63, 'name' => "C.S latante's Chicken Sandwich", 'menu_category_id' => 10, 'price' => 20],
            ['id' => 64, 'name' => 'T.S Tuna Sandwich', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 65, 'name' => 'CH.S Cheese Sandwich', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 66, 'name' => 'CI.S Club Sandwich', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 67, 'name' => 'F.Y Fried / Boiled Plantain', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 68, 'name' => 'F.P Fried / Boiled Yam', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 69, 'name' => 'Potato Saute', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 70, 'name' => 'Acheke', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 71, 'name' => 'Gari Fortor', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 72, 'name' => 'Eba / Eba Jollof', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 73, 'name' => 'Banku', 'menu_category_id' => 10, 'price' => 10],
            ['id' => 74, 'name' => "F.F French Fries", 'menu_category_id' => 10, 'price' => 20],
            ['id' => 75, 'name' => 'Vegetable Rice', 'menu_category_id' => 10, 'price' => 35],
            ['id' => 76, 'name' => 'Jollof Rice', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 77, 'name' => 'Fried Rice', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 78, 'name' => 'Plain Rice', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 79, 'name' => 'F.S.P Fried Sweet Potatoes', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 80, 'name' => 'Kra(Seasonal) Plaintain(Weekends Only)', 'menu_category_id' => 10, 'price' => 20],
            ['id' => 81, 'name' => 'D.1 Grilled Tilapia', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 82, 'name' => 'D.2 Okro Soup', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 83, 'name' => 'D.3 Okro Stew', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 84, 'name' => 'D.4 Goat Soup', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 85, 'name' => 'D.5 Palmnut Soup', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 86, 'name' => 'D.6 Duck Groundnut Soup', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 87, 'name' => 'D.7 Red Red', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 88, 'name' => 'D.8 Palava Sauce', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 89, 'name' => 'D.9 Garden Egg Stew', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 90, 'name' => 'D.10 Yevugboma Spinach Stew', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 91, 'name' => 'D.11 Chicken Lite Soup', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 92, 'name' => 'D.12 Tilapia Soup', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 93, 'name' => 'B.1 Grilled Chicken', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 94, 'name' => 'B.2 Fried Fish', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 95, 'name' => 'B.3 Steamed Tilapia', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 96, 'name' => 'B.4 Beef Stake', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 97, 'name' => 'B.5 Lamp Stake', 'menu_category_id' => 10, 'price' => 30],
            ['id' => 98, 'name' => 'B.7 Guinea Fowl', 'menu_category_id' => 10, 'price' => 30],


            ['id' => 99, 'name' => 'Black Label', 'menu_category_id' => 11, 'price' => 30],
            ['id' => 100, 'name' => 'Chivas Regal', 'menu_category_id' => 11, 'price' => 30],
            ['id' => 101, 'name' => 'Jack Daniels', 'menu_category_id' => 11, 'price' => 30],
            ['id' => 102, 'name' => 'J & B', 'menu_category_id' => 11, 'price' => 30],
            ['id' => 103, 'name' => 'Grants', 'menu_category_id' => 11, 'price' => 30],

            ['id' => 104, 'name' => 'Martell', 'menu_category_id' => 12, 'price' => 35],
            ['id' => 105, 'name' => 'Courvoisier', 'menu_category_id' => 12, 'price' => 35],
            ['id' => 106, 'name' => 'Remy Martin', 'menu_category_id' => 12, 'price' => 35],
            ['id' => 107, 'name' => 'Hennessy', 'menu_category_id' => 12, 'price' => 35],

            ['id' => 108, 'name' => 'Smirnoff', 'menu_category_id' => 13, 'price' =>25],
            ['id' => 109, 'name' => 'Vodka', 'menu_category_id' => 13, 'price' =>25],
            ['id' => 110, 'name' => 'Grey Goose', 'menu_category_id' => 13, 'price' =>25],

            ['id' => 111, 'name' => 'Gordens Gin', 'menu_category_id' => 14, 'price' =>20],
            ['id' => 112, 'name' => 'Beefeater', 'menu_category_id' => 14, 'price' =>20],

            ['id' => 113, 'name' => 'Baileys', 'menu_category_id' => 15, 'price' =>25],
            ['id' => 114, 'name' => 'Amarula', 'menu_category_id' => 15, 'price' =>25],
            ['id' => 115, 'name' => 'Campari', 'menu_category_id' => 15, 'price' =>25],

            ['id' => 116, 'name' => 'Herb Afrik', 'menu_category_id' => 16, 'price' =>5],
            ['id' => 117, 'name' => 'Alomo Bitters', 'menu_category_id' => 16, 'price' =>5],
            ['id' => 119, 'name' => 'Castle Bridge', 'menu_category_id' => 16, 'price' =>6],

            ['id' => 120, 'name' => 'Saint James', 'menu_category_id' => 17, 'price' => 25],
            ['id' => 121, 'name' => 'Captain Morgan', 'menu_category_id' => 17, 'price' => 25],
            ['id' => 122, 'name' => 'Malibu', 'menu_category_id' => 17, 'price' => 25],
            ['id' => 123, 'name' => 'Bacardi', 'menu_category_id' => 17, 'price' => 25],
            ['id' => 124, 'name' => 'Tequila', 'menu_category_id' => 17, 'price' => 25],

            ['id' => 125, 'name' => "Club Mini", 'menu_category_id' => 18, 'price' => 8],
            ['id' => 126, 'name' => 'Star Mini', 'menu_category_id' => 18, 'price' => 8],
            ['id' => 127, 'name' => 'Origin Mini', 'menu_category_id' => 18, 'price' => 9],
            ['id' => 128, 'name' => 'Club', 'menu_category_id' => 18, 'price' => 10],
            ['id' => 129, 'name' => 'Club Bubra', 'menu_category_id' => 18, 'price' => 10],
            ['id' => 130, 'name' => 'Stella Artois', 'menu_category_id' => 18, 'price' => 15],
            ['id' => 131, 'name' => 'Shandy', 'menu_category_id' => 18, 'price' => 10],
            ['id' => 132, 'name' => 'Shandy Mini', 'menu_category_id' => 18, 'price' => 8],
            ['id' => 133, 'name' => 'C.M.S', 'menu_category_id' => 18, 'price' => 10],
            ['id' => 134, 'name' => 'Guinness', 'menu_category_id' => 18, 'price' => 10],
            ['id' => 135, 'name' => 'Smirnoff', 'menu_category_id' => 18, 'price' => 10],
            ['id' => 136, 'name' => "Gulder", 'menu_category_id' => 18, 'price' => 12],
            ['id' => 137, 'name' => 'Heineken', 'menu_category_id' => 18, 'price' => 12],

            ['id' => 138, 'name' => 'Savanah Dry', 'menu_category_id' => 19, 'price' =>20],
            ['id' => 139, 'name' => 'Red Bull', 'menu_category_id' => 19, 'price' =>20],

            ['id' => 140, 'name' => 'Boiled Plantain', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 141, 'name' => 'Boiled Yam', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 142, 'name' => 'Fried Plantain', 'menu_category_id' => 9, 'price' => 0],
            ['id' => 143, 'name' => 'Fried Yam', 'menu_category_id' => 9, 'price' => 0],
        ]);
    }
}
