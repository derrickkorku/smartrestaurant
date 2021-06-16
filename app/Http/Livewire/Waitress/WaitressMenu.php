<?php

namespace App\Http\Livewire\Waitress;

use App\Models\MenuCategory;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WaitressMenu extends Component
{
    public $taxable = false, $tax = 17.5, $orders = [], $order_note = null, $takeaway = false;
    public $active_view = '', $cart_count = 0;


    public function changeView($view){
        $this->active_view = $view;
    }

    public function addOrder($menu, $is_food = 1,  $sd = null){
        \Cart::add([
            'id' => $name = $sd ? $menu['name']. ' + '. $sd['name'] : $menu['name'],
            'name' => $name,
            'price' => $menu['price'],
            'quantity' => 1,
            'attributes' => [
                'is_food' => $is_food,
                'menu_id' => $menu['id']
            ]
        ]);

        $this->setCartCount();
    }

    public function setCartCount(){
        $this->cart_count = \Cart::getContent()->count();
    }

    public function increaseItem($order){
        \Cart::update(''.$order['id'], [
            'quantity' => 1
        ]);
    }

    public function decreaseItem($order){
        \Cart::update(''.$order['id'], [
            'quantity' => -1
        ]);
    }


    public function removeItem($order) {
        \Cart::remove(''.$order['id']);
        $this->setCartCount();
    }

    public function clearItems() {
        \Cart::clear();
        $this->setCartCount();
    }

    public function saveOrder() {
        $order_tax = $this->taxable ? $this->tax : 0.0;

        $main_order = Order::create([
            'user_id' => auth()->user()->id,
            'tax' => $order_tax,
            'total' => $total = \Cart::getTotal(),
            'sub_total' => $order_tax * $total,
            'note' => $this->order_note,
            'is_take_away' => $this->takeaway,
            'status' => 'new'
        ]);

        $order_details = [];

        foreach(\Cart::getContent() as $order) {
            $order_details[] = [
                'order_id' => $main_order->id,
                'menu_id' => $order['attributes']['menu_id'],
                'title' => $order['name'],
                'quantity' => $order['quantity'],
                'is_food' => $order['attributes']['is_food'],
                'total' => $order['quantity'] * $order['price']
            ];

            if (! $order['attributes']['is_food']) {
                $inventory = Inventory::whereMenuId($order['id'])->whereWarehouseId(Auth::user()->warehouse_id)->latest()->first();
                $inventory->current_stock = $inventory->starting_stock - $order['quantity'];
                $inventory->save();
            }

        }

        OrderDetails::insert($order_details);

        \Cart::clear();
        $this->setCartCount();
    }

    public function mount(){
        \Cart::session(auth()->user()->id);
        $this->setCartCount();
    }

    public function render()
    {
        $this->setCartCount();
        $drinks = MenuCategory::with('menu')->where('type', 'drink')->get();
        $foods = MenuCategory::with('menu')->where([
            ['type', '=', 'food'],
            ['is_side_dish', '=', false]
        ])->get();

        $side_dish = MenuCategory::with('menu')->where([
            ['type', '=', 'food'],
            ['is_side_dish', '=', true]
        ])->get();

        $side_dish = $side_dish[0]->menu;

        return view('livewire.waitress.waitress-menu', [
            'drinks' => $drinks,
            'foods' => $foods,
            'side_dish' => $side_dish
        ]);
    }
}
