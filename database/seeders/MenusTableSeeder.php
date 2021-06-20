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
        static $i = 1;
        DB::table('menus')->delete();
        DB::table('menus')->insert([
            ['id' => $i++, 'name' => 'A.1 Spring Roll', 'menu_category_id' => 1, 'price' => 20],
            ['id' => $i++, 'name' => 'A.2 Kelewele', 'menu_category_id' => 1, 'price' => 25],
            ['id' => $i++, 'name' => 'A.3 Chicken Wings(3pcs)', 'menu_category_id' => 1, 'price' => 28],
            ['id' => $i++, 'name' => 'Tea/Green', 'menu_category_id' => 1, 'price' => 10],
            ['id' => $i++, 'name' => 'illy Coffee', 'menu_category_id' => 1, 'price' => 20],

            ['id' => $i++, 'name' => 'A.4 Chicken Salad', 'menu_category_id' => 2, 'price' => 55],
            ['id' => $i++, 'name' => 'A.5 Tuna Salad', 'menu_category_id' => 2, 'price' => 55],
            ['id' => $i++, 'name' => 'A.6 Beef Salad', 'menu_category_id' => 2, 'price' => 65],
            ['id' => $i++, 'name' => 'A.7 Avocado Salad(Seasonal)', 'menu_category_id' => 2, 'price' => 70],
            ['id' => $i++, 'name' => 'Vegetable Salad', 'menu_category_id' => 2, 'price' => 50],

            ['id' => $i++, 'name' => 'C.1 French Fries with Sandwich', 'menu_category_id' => 3, 'price' => 50],
            ['id' => $i++, 'name' => 'C.2 Couscous with Veg and Fish', 'menu_category_id' => 3, 'price' => 80],
            ['id' => $i++, 'name' => 'C.3 Spaghetti Chicken In Veg', 'menu_category_id' => 3, 'price' => 63],
            ['id' => $i++, 'name' => 'C.4 Spaghetti In Meat Balls Sauce', 'menu_category_id' => 3, 'price' => 63],
            ['id' => $i++, 'name' => 'C.5 Corn Beef Stew with Boiled Plantain/Rice/Yam', 'menu_category_id' => 3, 'price' => 65],
            ['id' => $i++, 'name' => 'C.6 Grilled Chicken & Acheke & Veg', 'menu_category_id' => 3, 'price' => 75],
            ['id' => $i++, 'name' => 'C.7 Grilled Tilapia & Acheke & Veg', 'menu_category_id' => 3, 'price' => 75],
            ['id' => $i++, 'name' => 'C.8 Beef Steak & Acheke & Veg', 'menu_category_id' => 3, 'price' => 75],
            ['id' => $i++, 'name' => 'C.9 Guinea & Acheke & Veg', 'menu_category_id' => 3, 'price' => 75],

            ['id' => $i++, 'name' => 'D.1 Grilled Tilapia (Fresh Grrinded Pepper)', 'menu_category_id' => 4, 'price' => 65],
            ['id' => $i++, 'name' => 'D.2 Okro Soup with Crab/Fish Beef/Goat Meat', 'menu_category_id' => 4, 'price' => 65],
            ['id' => $i++, 'name' => 'D.3 Okro Stew (Fish/Beef/Goat Meat)', 'menu_category_id' => 4, 'price' => 65],
            ['id' => $i++, 'name' => 'D.4 Goat Soup', 'menu_category_id' => 4, 'price' => 65],
            ['id' => $i++, 'name' => 'D.5 Palmnut Soup(Beef/Goat Meat/Fish)', 'menu_category_id' => 4, 'price' => 65],
            ['id' => $i++, 'name' => 'D.6 Duck Groundnut', 'menu_category_id' => 4, 'price' => 65],
            ['id' => $i++, 'name' => 'D.7 Red Red with Fish/Chicken/Beef', 'menu_category_id' => 4, 'price' => 65], 
            ['id' => $i++, 'name' => 'D.8 Palava Sauce(Fish/Chicken/Beef)', 'menu_category_id' => 4, 'price' => 65],
            ['id' => $i++, 'name' => 'D.9 Garden Egg Stew (Fish/Chicken/Beef)', 'menu_category_id' => 4, 'price' => 65],
            ['id' => $i++, 'name' => 'D.10 Yevugboma (Spinach Sauce) Fish/Beef/Goat Meat', 'menu_category_id' => 4, 'price' => 65],
            ['id' => $i++, 'name' => 'D.11 Chicken Lite Soup(Layer)', 'menu_category_id' => 4, 'price' => 65],
            ['id' => $i++, 'name' => 'D.12 Chicken Tilapia Soup', 'menu_category_id' => 4, 'price' => 70],

            ['id' => $i++, 'name' => 'V.D.1 Local/Foreign Mushroom Saute with Vegetables', 'menu_category_id' => 5, 'price' => 62],
            ['id' => $i++, 'name' => 'V.D.2 Vegetable Couscous (Jollof)', 'menu_category_id' => 5, 'price' => 60],
            ['id' => $i++, 'name' => 'V.D.3 Garden Eggs Stew with Soya Chunck', 'menu_category_id' => 5, 'price' => 60],
            ['id' => $i++, 'name' => 'V.D.4 Spaghetti In Vegetable Sauce', 'menu_category_id' => 5, 'price' => 65],
            ['id' => $i++, 'name' => 'V.D.5 Agushi Palava Sauce', 'menu_category_id' => 5, 'price' => 60],
            ['id' => $i++, 'name' => 'V.D.6 Veg Only', 'menu_category_id' => 5, 'price' => 30],

            ['id' => $i++, 'name' => 'Beef Fillet Khebab', 'menu_category_id' => 6, 'price' => 35],
            ['id' => $i++, 'name' => 'Chicken Khebab', 'menu_category_id' => 6, 'price' => 35],
            ['id' => $i++, 'name' => 'Goat Khebab', 'menu_category_id' => 6, 'price' => 35],

            ['id' => $i++, 'name' => 'B.1 Grilled Chicken', 'menu_category_id' => 7, 'price' => 55],
            ['id' => $i++, 'name' => 'B.2 Seasoned Fried Fish(Fillet)', 'menu_category_id' => 7, 'price' => 60],
            ['id' => $i++, 'name' => 'B.3 Steamed Tilapia', 'menu_category_id' => 7, 'price' => 70],
            ['id' => $i++, 'name' => 'B.4 Beef Steak', 'menu_category_id' => 7, 'price' => 65],
            ['id' => $i++, 'name' => 'B.5 Lamb Chops', 'menu_category_id' => 7, 'price' => 65],
            ['id' => $i++, 'name' => 'B.7 Guinea Fowl', 'menu_category_id' => 7, 'price' => 65],
            ['id' => $i++, 'name' => 'B.8 Boneless Duck in Veg. Sauce', 'menu_category_id' => 7, 'price' => 70], 
            ['id' => $i++, 'name' => 'B.9 Shredded Chicken in Veg. Sauce', 'menu_category_id' => 7, 'price' => 63],
            ['id' => $i++, 'name' => 'B.10 Eba with (Sadin Sauce/Fried Egg and Grounded Pepper and Shito)', 'menu_category_id' => 7, 'price' => 55],
            ['id' => $i++, 'name' => 'G.Q Charcoal Grilled Quail', 'menu_category_id' => 7, 'price' => 50],

            ['id' => $i++, 'name' => 'Ice Cream', 'menu_category_id' => 8, 'price' => 20],
            ['id' => $i++, 'name' => 'Chocolate, Vanilla, Strawbery', 'menu_category_id' => 8, 'price' => 20],
            ['id' => $i++, 'name' => 'Pancakes', 'menu_category_id' => 8, 'price' => 20],

            ['id' => $i++, 'name' => 'Jollof Rice', 'menu_category_id' => 9, 'price' => 0],
            ['id' => $i++, 'name' => 'Plain Rice', 'menu_category_id' => 9, 'price' => 0],
            ['id' => $i++, 'name' => 'Fried Rice', 'menu_category_id' => 9, 'price' => 0],
            ['id' => $i++, 'name' => 'Fufu', 'menu_category_id' => 9, 'price' => 0],
            ['id' => $i++, 'name' => 'Banku', 'menu_category_id' => 9, 'price' => 0],
            ['id' => $i++, 'name' => 'Eba / Eba Jollof', 'menu_category_id' => 9, 'price' => 0],
            ['id' => $i++, 'name' => 'Gari Fortor', 'menu_category_id' => 9, 'price' => 0],
            ['id' => $i++, 'name' => 'Acheke', 'menu_category_id' => 9, 'price' => 0],
            ['id' => $i++, 'name' => 'French Fries', 'menu_category_id' => 9, 'price' => 0],
            ['id' => $i++, 'name' => 'Potato Saute', 'menu_category_id' => 9, 'price' => 0],
            ['id' => $i++, 'name' => 'Eworkple', 'menu_category_id' => 9, 'price' => 0],

            ['id' => $i++, 'name' => "C.S latante's Chicken Sandwich", 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'T.S Tuna Sandwich', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'CH.S Cheese Sandwich', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'CI.S Club Sandwich', 'menu_category_id' => 10, 'price' => 35],
            ['id' => $i++, 'name' => 'F.Y Fried / Boiled Plantain', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'F.P Fried / Boiled Yam', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'Potato Saute', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'Acheke', 'menu_category_id' => 10, 'price' =>30],
            ['id' => $i++, 'name' => 'Gari Fortor', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'Eba / Eba Jollof', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'Banku', 'menu_category_id' => 10, 'price' => 5],
            ['id' => $i++, 'name' => "F.F French Fries", 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'Vegetable Rice', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'Jollof Rice', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'Fried Rice', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'Plain Rice', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'F.S.P Fried Sweet Potatoes', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'Kra(Seasonal) Plaintain(Weekends Only)', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'D.1 Grilled Tilapia', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.2 Okro Soup', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.3 Okro Stew', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.4 Goat Soup', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.5 Palmnut Soup', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.6 Duck Groundnut Soup', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.7 Red Red', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.8 Palava Sauce', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.9 Garden Egg Stew', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.10 Yevugboma Spinach Stew', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.11 Chicken Lite Soup', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'D.12 Tilapia Soup', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'B.1 Grilled Chicken', 'menu_category_id' => 10, 'price' => 30],
            ['id' => $i++, 'name' => 'B.2 Fried Fish', 'menu_category_id' => 10, 'price' => 35],
            ['id' => $i++, 'name' => 'B.3 Steamed Tilapia', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'B.4 Beef Stake', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'B.5 Lamp Stake', 'menu_category_id' => 10, 'price' => 40],
            ['id' => $i++, 'name' => 'B.7 Guinea Fowl', 'menu_category_id' => 10, 'price' => 35],

            ['id' => $i++, 'name' => 'Black Label', 'menu_category_id' => 11, 'price' => 30],
            ['id' => $i++, 'name' => 'Chivas Regal', 'menu_category_id' => 11, 'price' => 30],
            ['id' => $i++, 'name' => 'Jack Daniels', 'menu_category_id' => 11, 'price' => 30],
            ['id' => $i++, 'name' => 'J & B', 'menu_category_id' => 11, 'price' => 30],
            ['id' => $i++, 'name' => 'Grants', 'menu_category_id' => 11, 'price' => 30],

            ['id' => $i++, 'name' => 'Martell', 'menu_category_id' => 12, 'price' => 35],
            ['id' => $i++, 'name' => 'Courvoisier', 'menu_category_id' => 12, 'price' => 35],
            ['id' => $i++, 'name' => 'Remy Martin', 'menu_category_id' => 12, 'price' => 35],
            ['id' => $i++, 'name' => 'Hennessy', 'menu_category_id' => 12, 'price' => 35],

            ['id' => $i++, 'name' => 'Smirnoff', 'menu_category_id' => 13, 'price' => 25],
            ['id' => $i++, 'name' => 'Vodka', 'menu_category_id' => 13, 'price' => 25],
            ['id' => $i++, 'name' => 'Grey Goose', 'menu_category_id' => 13, 'price' => 25],

            ['id' => $i++, 'name' => 'Gordens Gin', 'menu_category_id' => 14, 'price' => 20],
            ['id' => $i++, 'name' => 'Beefeater', 'menu_category_id' => 14, 'price' => 20],

            ['id' => $i++, 'name' => 'Baileys', 'menu_category_id' => 15, 'price' => 25],
            ['id' => $i++, 'name' => 'Amarula', 'menu_category_id' => 15, 'price' => 25],
            ['id' => $i++, 'name' => 'Campari', 'menu_category_id' => 15, 'price' => 25],

            ['id' => $i++, 'name' => 'Herb Afrik', 'menu_category_id' => 16, 'price' => 5],
            ['id' => $i++, 'name' => 'Alomo Bitters', 'menu_category_id' => 16, 'price' => 5],
            ['id' => $i++, 'name' => 'Castle Bridge', 'menu_category_id' => 16, 'price' => 6],

            ['id' => $i++, 'name' => 'Saint James', 'menu_category_id' => 17, 'price' => 25],
            ['id' => $i++, 'name' => 'Captain Morgan', 'menu_category_id' => 17, 'price' => 25],
            ['id' => $i++, 'name' => 'Malibu', 'menu_category_id' => 17, 'price' => 25],
            ['id' => $i++, 'name' => 'Bacardi', 'menu_category_id' => 17, 'price' => 25],
            ['id' => $i++, 'name' => 'Tequila', 'menu_category_id' => 17, 'price' => 25],

            ['id' => $i++, 'name' => "Club Mini", 'menu_category_id' => 18, 'price' => 8],
            ['id' => $i++, 'name' => 'Star Mini', 'menu_category_id' => 18, 'price' => 8],
            ['id' => $i++, 'name' => 'Origin Mini', 'menu_category_id' => 18, 'price' => 9],
            ['id' => $i++, 'name' => 'Club', 'menu_category_id' => 18, 'price' => 10],
            ['id' => $i++, 'name' => 'Club Bubra', 'menu_category_id' => 18, 'price' => 10],
            ['id' => $i++, 'name' => 'Stella Artois', 'menu_category_id' => 18, 'price' => 15],
            ['id' => $i++, 'name' => 'Shandy', 'menu_category_id' => 18, 'price' => 10],
            ['id' => $i++, 'name' => 'Shandy Mini', 'menu_category_id' => 18, 'price' => 8],
            ['id' => $i++, 'name' => 'C.M.S', 'menu_category_id' => 18, 'price' => 10],
            ['id' => $i++, 'name' => 'Guinness', 'menu_category_id' => 18, 'price' => 10],
            ['id' => $i++, 'name' => 'Smirnoff', 'menu_category_id' => 18, 'price' => 10],
            ['id' => $i++, 'name' => "Gulder", 'menu_category_id' => 18, 'price' => 12],
            ['id' => $i++, 'name' => 'Heineken', 'menu_category_id' => 18, 'price' => 12],

            ['id' => $i++, 'name' => 'Savanah Dry', 'menu_category_id' => 19, 'price' => 20],
            ['id' => $i++, 'name' => 'Red Bull', 'menu_category_id' => 19, 'price' => 20],

            ['id' => $i++, 'name' => 'Small Water', 'menu_category_id' => 20, 'price' => 5],
            ['id' => $i++, 'name' => 'Big Water', 'menu_category_id' => 20, 'price' => 10],
            ['id' => $i++, 'name' => 'Sparkling Water', 'menu_category_id' => 20, 'price' => 20],

            ['id' => $i++, 'name' => 'Coke', 'menu_category_id' => 21, 'price' => 5],
            ['id' => $i++, 'name' => 'Coke Lite', 'menu_category_id' => 21, 'price' => 5],
            ['id' => $i++, 'name' => 'Fanta', 'menu_category_id' => 21, 'price' => 5],
            ['id' => $i++, 'name' => 'Sprite', 'menu_category_id' => 21, 'price' => 5],
            ['id' => $i++, 'name' => 'Tonic', 'menu_category_id' => 21, 'price' => 5],
            ['id' => $i++, 'name' => 'Soda', 'menu_category_id' => 21, 'price' => 5],
            ['id' => $i++, 'name' => 'Can Fanta', 'menu_category_id' => 21, 'price' => 6],
            ['id' => $i++, 'name' => 'Can Sprite', 'menu_category_id' => 21, 'price' => 6],
            ['id' => $i++, 'name' => 'Can Coke', 'menu_category_id' => 21, 'price' => 6],
            ['id' => $i++, 'name' => 'Alvaro', 'menu_category_id' => 21, 'price' => 8],
            ['id' => $i++, 'name' => 'Malt', 'menu_category_id' => 21, 'price' => 8],
            ['id' => $i++, 'name' => 'Origin Zero', 'menu_category_id' => 21, 'price' => 8],

            ['id' => $i++, 'name' => 'Freshly squeezed Pineapple Juice', 'menu_category_id' => 22, 'price' => 9],
            ['id' => $i++, 'name' => 'Watermelon Juice', 'menu_category_id' => 22, 'price' => 9],

            ['id' => $i++, 'name' => 'Cabernet Sauvignon', 'menu_category_id' => 23, 'price' => 70],
            ['id' => $i++, 'name' => 'Merlot', 'menu_category_id' => 23, 'price' => 70],
            ['id' => $i++, 'name' => 'Shiraz', 'menu_category_id' => 23, 'price' => 70],
            ['id' => $i++, 'name' => 'Sauvignon', 'menu_category_id' => 23, 'price' => 70],
            ['id' => $i++, 'name' => 'Wine Per Glass', 'menu_category_id' => 23, 'price' => 30],
        ]);
    }
}
