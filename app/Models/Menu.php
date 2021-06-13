<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'menu_category_id', 'price'];

    public function menu_category(){
        return $this->belongsTo(MenuCategory::class);
    }
}
