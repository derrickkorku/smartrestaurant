<?php

namespace App\Http\Livewire\Inventory;

use App\Models\Inventory as ModelsInventory;
use App\Models\Menu;
use App\Models\Warehouse;
use App\Traits\LivewireUtil;
use Livewire\Component;

class Inventory extends Component
{
    use LivewireUtil;

    public $warehouse_id, $menu_id, $starting_stock, $current_stock, $inventory_date, $item_type, $menu_items, $warehouses;

    private $fillable = ['warehouse_id', 'menu_id', 'starting_stock', 'current_stock', 'item_type', 'inventory_date'];

    protected $rules = [
        'warehouse_id' => 'integer|required|exists:warehouses,id',
        'menu_id' => 'integer|required|exists:menus,id',
        'starting_stock' => 'integer|required',
        'item_type' => 'string|required|in:food,drink',
        'inventory_date' => 'date|required'
    ];

    public function store()
    {
        $this->validate();

        $data = [];

        foreach ($this->fills as $key) {
            $data["{$key}"] = $this->{$key};
        }

        if (! $this->model_id){
            $data['current_stock'] = $data['starting_stock'];
        }

        $this->Model->updateOrCreate(['id' => $this->model_id], $data);
        $this->emitTo('shared.flash-message', 'message', 'success', $this->model_id ? 'Update Successful' : 'Record Created Successfully.');

        $this->emit('refreshLivewireDatatable');

        $this->resetInputFields();
        $this->closeModal();
    }

    public function mount(ModelsInventory $model){
        $this->Model = $model;
        $this->fills = $this->fillable;
    }

    public function render()
    {
        $this->warehouses = Warehouse::all();
        $this->menu_items = Menu::all();
        return view('livewire.inventory.inventory');
    }
}
