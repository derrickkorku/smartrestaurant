<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class SaleToday extends Component
{
    public $total_sales;

    public function render()
    {
        $this->total_sales = Order::whereDate('created_at', Carbon::today())->sum('total');
        return view('livewire.admin.sale_today');
    }
}
