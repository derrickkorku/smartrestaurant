<?php

namespace App\Http\Livewire\Menu;

use App\Models\MenuCategory;
use Livewire\Component;
use Livewire\WithPagination;

class MenuCategories extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.menu.menu-categories', [
            'menuCategories' => MenuCategory::all()
        ]);
    }
}
