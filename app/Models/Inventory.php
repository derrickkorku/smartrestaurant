<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['warehouse_id', 'menu_id', 'starting_stock', 'current_stock', 'item_type', 'inventory_date'];

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
