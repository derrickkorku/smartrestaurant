<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Menu extends Component
{
    public $input = [
        'name' => '',
        'menu_category_id' => 1,
        'price' => 0,
        'quantity' => 0
    ];

    public function render()
    {
        return view('livewire.admin.menu');
    }
}
