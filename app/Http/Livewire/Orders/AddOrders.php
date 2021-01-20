<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;

class AddOrders extends Component
{
    public $taxable = false, $tax = 17.5;

    public function render()
    {
        return view('livewire.orders.add-orders');
    }
}
