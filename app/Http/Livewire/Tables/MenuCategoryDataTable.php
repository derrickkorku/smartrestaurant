<?php

namespace App\Http\Livewire\Tables;

use App\Models\MenuCategory;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MenuCategoryDataTable extends LivewireDatatable
{
    public $model = MenuCategory::class;
    public $hideable = 'select';
    public $exportable = true;

    public function columns()
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id')
                ->label('ID')
                ->delete(),

            Column::name('name')
                ->label('Name')
                ->editable()
                ->searchable()
                ->filterable(),

            Column::name('type')
                ->searchable($this->menuTypes)
                ->editable()
                ->filterable(),

            BooleanColumn::callback(['is_main_dish'], function ($is_main_dish) {
                if (!$is_main_dish) {
                    return 'No';
                }
                return 'Yes';
            })
                ->label('Main Dish')
                ->filterable(),

            BooleanColumn::callback(['is_side_dish'], function ($is_side_dish) {
                if (!$is_side_dish) {
                    return 'No';
                }
                return 'Yes';
            })
                ->label('Side Dish')
                ->filterable(),
        ];
    }

    public function getMenuTypesProperty(){
        return ['food', 'drink'];
    }
}
