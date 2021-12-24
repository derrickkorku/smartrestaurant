<?php

namespace App\Http\Livewire\Tables;

use App\Models\Order;
use Carbon\Carbon;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class SalesTodayTable extends LivewireDatatable
{
    public $model = Order::class;
    public $hideable = 'select';
    public $exportable = true;

    public function builder()
    {
        return Order::whereDate('orders.created_at', Carbon::today())->where('orders.status', '=', 'processed')
            ->join('order_details', 'order_details.order_id', 'orders.id')->groupBy('orders.id')->orderBy('orders.created_at', 'desc');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID'),
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
}
