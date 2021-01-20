<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $fillable = ['name', 'type', 'is_side_dish', 'is_main_dish'];

    public function menu() {
        return $this->hasMany(Menu::class);
    }
}
