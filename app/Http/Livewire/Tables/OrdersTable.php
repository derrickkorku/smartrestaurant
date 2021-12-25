<?php

namespace App\Http\Livewire\Tables;

use App\Models\Order;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class OrdersTable extends LivewireDatatable
{
    public $model = Order::class;
    public $hideable = 'select';
    public $exportable = true;

    public function builder()
    {
        return Order::query()->join('order_details', 'order_details.order_id', 'orders.id')->groupBy('orders.id')->orderBy('orders.created_at', 'desc');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID'),
            DateColumn::name('created_at'),
            Column::name('status')->filterable($this->status)->searchable($this->status),
            Column::name('total')->label('Total Amount')->searchable(),
            BooleanColumn::callback(['is_take_away'], function ($takeaway) {
                if (!$takeaway) {
                    return 'No';
                }
                return 'Yes';
            })->label('Takeaway')->filterable(),
            Column::raw('GROUP_CONCAT(CONCAT(order_details.title, "(qty - ", order_details.quantity, ")") SEPARATOR " | ") AS Items'),
        ];
    }

    public function getStatusProperty(){
        return ['new', 'received', 'processed', 'delivered', 'paid'];
    }
}
