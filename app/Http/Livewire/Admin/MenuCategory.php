<?php

namespace App\Http\Livewire\Admin;

use App\Models\MenuCategory as ModelsMenuCategory;
use App\Traits\LivewireUtil;
use Livewire\Component;

class MenuCategory extends Component
{
    use LivewireUtil;

    public $name, $type='food', $is_main_dish = false, $is_side_dish = false;

    private $fillable = ['name', 'type', 'is_main_dish', 'is_side_dish'];
    private $validation_rule = [
        'name' => 'required',
        'type' => 'required|in:food,drink',
        'is_main_dish' => 'boolean',
        'is_side_dish' => 'boolean'
    ];

    public function mount(){
        $this->Model = New ModelsMenuCategory();
        $this->fills = $this->fillable;
        $this->rules = $this->validation_rule;
    }

    public function render()
    {
        return view('livewire.admin.menu-category')->layout('layouts.admin');
    }

}
