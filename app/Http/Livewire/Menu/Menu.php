<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu as ModelsMenu;
use Livewire\Component;
use Livewire\WithPagination;

class Menu extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.menu.menu', [
            'menu' => ModelsMenu::all()
        ]);
    }
}
