<?php

namespace App\Http\Livewire\Tables;

use App\Models\Inventory as ModelsInventory;
use App\Models\Menu;
use App\Models\Warehouse;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Inventory extends LivewireDatatable
{
    public $model = ModelsInventory::class;

    public function builder()
    {
        return ModelsInventory::with('menu', 'warehouse');
    }

    public function columns()
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id')->label('ID'),
            NumberColumn::name('starting_stock')->filterable()->searchable(),
            NumberColumn::name('current_stock')->filterable()->searchable(),
            Column::name('item_type')->filterable(['food', 'drink'])->searchable(),
            Column::name('menu.name')->label('Item')->filterable($this->items)->searchable(),
            Column::name('warehouse.name')->label('Warehouse')->filterable($this->warehouse)->searchable(),
            DateColumn::name('inventory_date')->filterable()->searchable(),
            // Column::callback(['id'], function($id){
            //     return view('table-actions.datatable-actions', ['id' => $id]);
            // }),
        ];
    }

    public function getItemsProperty(){
        return Menu::pluck('name');
    }

    public function getWarehouseProperty(){
        return Warehouse::pluck('name');
    }
}
