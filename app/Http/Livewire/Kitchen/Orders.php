<?php

namespace App\Http\Livewire\Kitchen;

use App\Models\Inventory;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetails;
use Livewire\Component;

class Orders extends Component
{
    public $new_orders = [], $received_orders = [], $processed_orders = [], $play_sound = false;

    protected $listeners = ['orderAdded' => '$refresh'];

    private function setNewOrders()
    {
        $orders = Order::newOrders()->get();

        $this->new_orders = [];

        foreach ($orders as $order) {
            $order_details = OrderDetails::belongsToOrder($order->id)->isFood()->get();
            if ($order_details && sizeof($order_details) > 0) {
                $this->new_orders[] = $order_details;
            }
        }

    }

    private function setReceivedOrders()
    {
        $orders = Order::receivedOrders()->with('user.warehouse')->get();

        $this->received_orders = [];

        foreach ($orders as $order) {
            $order_details = OrderDetails::belongsToOrder($order->id)->isFood()->get();
            if ($order_details && sizeof($order_details) > 0) {
                $new_order = [
                    'order' => $order,
                    'order_details' => $order_details,
                ];

                $this->received_orders[] = $new_order;
            }
        }
    }

    private function setProcessedOrders()
    {
        $orders = Order::processedOrders()->with('user.warehouse')->latest()->limit(15)->get();

        $this->processed_orders = [];

        foreach ($orders as $order) {
            $order_details = OrderDetails::belongsToOrder($order->id)->isFood()->get();
            if ($order_details && sizeof($order_details) > 0) {
                $new_order = [
                    'order' => $order,
                    'order_details' => $order_details,
                ];
                $this->processed_orders[] = $new_order;
            }
        }
    }

    public function receiveOrder($order)
    {
        $order = Order::find($order[0]['order_id']);
        $order->status = 'received';
        $order->save();

        $this->setNewOrders();
        $this->setReceivedOrders();
    }

    public function processOrder($order)
    {
        $order = Order::find($order['id']);
        $order->status = 'processed';
        $order->save();

        $this->setProcessedOrders();
        $this->setReceivedOrders();

        $this->processInventory($order['id']);
    }

    private function processInventory($order_id)
    {
        $order_details = OrderDetails::whereOrderId($order_id)->get();

        foreach ($order_details as $order_detail) {
            $menu_titles = explode('+', $order_detail->title);

            for ($i = 0; $i < sizeof($menu_titles); $i++) {
                $menu_titles[$i] = trim($menu_titles[$i]);
                if (in_array($menu_titles[$i], ['A.1 Spring Roll', 'A.3 Chicken Wings(3pcs)'])) {

                    $menu = Menu::whereName($menu_titles[$i])->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - (3 * $order_detail->quantity);
                        $inventory->save();
                    }
                } else if (in_array($menu_titles[$i], [
                    'A.2 Kelewele', 'A.5 Tuna Salad',
                    'D.1 Grilled Tilapia (Fresh Grrinded Pepper)', 'D.2 Okro Soup with Crab/Fish Beef/Goat', 'D.3 Okro Stew (Fish/Beef/Goat Meat)', 'D.4 Goat Soup', 'D.5 Palmnut Soup(Beef/Goat Meat/Fish)', 'D.6 Duck Groundnut', 'D.7 Red Red with Fish/Chicken/Beef', 'D.8 Palava Sauce(Fish/Chicken/Beef)', 'D.9 Garden Egg Stew (Fish/Chicken/Beef)', 'D.10 Yevugboma (Spinach Sauce) Fish/Beef/Goat Meat', 'D.11 Chicken Lite Soup(Layer)', 'D.12 Chicken Tilapia Soup',
                    'V.D.1 Local/Foreign Mushroom Saute with Vegetables', 'V.D.2 Vegetable Couscous (Jollof)', 'V.D.3 Garden Eggs Stew with Soya Chunck', 'V.D.4 Spaghetti In Vegetable Sauce', 'V.D.5 Agushi Palava Sauce', 'V.D.6 Veg Only',
                    'Beef Fillet Khebab', 'Chicken Khebab', 'Goat Khebab',
                    'B.1 Grilled Chicken', 'B.2 Seasoned Fried Fish(Fillet)', 'B.3 Steamed Tilapia', 'B.4 Beef Steak', 'B.5 Lamb Chops', 'B.7 Guinea Fowl', 'B.8 Boneless Duck in Veg. Sauce', 'B.9 Shredded Chicken in Veg. Sauce', 'B.10 Eba with (Sadin Sauce/Fried Egg and Grounded Pepper and Shito)', 'G.Q Charcoal Grilled Quail',
                    'C.5 Corn Beef Stew with Boiled Plantain/Rice/Yam',
                ])) {
                    $menu = Menu::whereName($menu_titles[$i])->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }
                } else if ($menu_titles[$i] == 'A.4 Chicken Salad') {
                    $menu = Menu::whereName('Chicken')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }
                } else if ($menu_titles[$i] == 'C.1 French Fries with Sandwich') {
                    $chicken_menu = Menu::whereName('Chicken')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $chicken_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - (0.5 * $order_detail->quantity);
                        $inventory->save();
                    }

                    $ff_menu = Menu::whereName('French Fries')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $ff_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }
                } else if ($menu_titles[$i] == 'C.3 Spaghetti Chicken In Veg') {
                    $chicken_menu = Menu::whereName('Chicken')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $chicken_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }

                    $s_menu = Menu::whereName('Spaghetti')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $s_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }
                } else if ($menu_titles[$i] == 'C.4 Spaghetti In Meat Balls Sauce') {
                    $mb_menu = Menu::whereName('Meat Balls')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $mb_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }

                    $s_menu = Menu::whereName('Spaghetti')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $s_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }
                } else if ($menu_titles[$i] == 'C.6 Grilled Chicken & Acheke & Veg') {
                    $chicken_menu = Menu::whereName('Chicken')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $chicken_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }

                    $ak_menu = Menu::whereName('Acheke')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $ak_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }

                } else if ($menu_titles[$i] == 'C.7 Grilled Tilapia & Acheke & Veg') {
                    $tp = Menu::whereName('Tilapia')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $tp->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }

                    $ak_menu = Menu::whereName('Acheke')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $ak_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }
                } else if ($menu_titles[$i] == 'C.8 Beef Steak & Acheke & Veg') {
                    $bs = Menu::whereName('Beef Steak')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $bs->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }

                    $ak_menu = Menu::whereName('Acheke')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $ak_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }
                } else if ($menu_titles[$i] == 'C.9 Guinea & Acheke & Veg') {
                    $gf = Menu::whereName('Guinea Fowl')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $gf->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }

                    $ak_menu = Menu::whereName('Acheke')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $ak_menu->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }
                } else if (in_array($menu_titles[$i], ['Jollof Rice', 'Plain Rice', 'Fried Rice'])) {
                    $f = Menu::whereName('Rice')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $f->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }

                } else if ($menu_titles[$i] == 'Acheke') {
                    $f = Menu::whereName('Acheke')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $f->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }
                } else if(in_array($menu_titles[$i], ['B.6 Beef Sauce', 'A.6 Beef Salad'])) {
                    $f = Menu::whereName('Shreded Beef')->first();

                    $inventory = Inventory::where([
                        ['menu_id', '=', $f->id],
                        ['warehouse_id', '=', 3],
                        ['item_type', '=', 'food'],
                    ])->latest()->first();

                    if ($inventory) {
                        $inventory->current_stock = $inventory->current_stock - $order_detail->quantity;
                        $inventory->save();
                    }
                }

            }

        }

    }

    public function cancelOrder($order)
    {
        Order::find($order['id'])->delete();
        OrderDetails::whereOrderId($order['id'])->delete();

        $this->setReceivedOrders();
    }

    public function render()
    {
        $this->setNewOrders();
        $this->setReceivedOrders();
        $this->setProcessedOrders();

        return view('livewire.kitchen.orders');
    }
}
