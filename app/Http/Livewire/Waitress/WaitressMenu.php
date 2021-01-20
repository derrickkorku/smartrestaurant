<?php

namespace App\Http\Livewire\Waitress;

use App\Models\MenuCategory;
use App\Models\Order;
use App\Models\OrderDetails;
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
            'id' => $menu['id'],
            'name' => $sd ? $menu['name']. ' + '. $sd['name'] : $menu['name'],
            'price' => $menu['price'],
            'quantity' => 1,
            'attributes' => [
                'is_food' => $is_food
            ]
        ]);

        $this->setCartCount();
    }

    public function setCartCount(){
        $this->cart_count = \Cart::getContent()->count();
    }

    public function increaseItem($id){
        \Cart::update($id, [
            'quantity' => 1
        ]);
    }

    public function decreaseItem($id){
        \Cart::update($id, [
            'quantity' => -1
        ]);
    }


    public function removeItem($id) {
        \Cart::remove($id);
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
                'menu_id' => $order['id'],
                'title' => $order['name'],
                'quantity' => $order['quantity'],
                'is_food' => $order['attributes']['is_food'],
                'total' => $order['quantity'] * $order['price']
            ];

        }

        OrderDetails::insert($order_details);

        $this->emit('orderAdded');

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
        ])->layout('layouts.waitress');
    }
}
