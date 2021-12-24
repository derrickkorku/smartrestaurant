<?php

use App\Http\Livewire\Admin\Account;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Menu;
use App\Http\Livewire\Admin\MenuCategory;
use App\Http\Livewire\Admin\SaleToday;
use App\Http\Livewire\Inventory\Inventory;
use App\Http\Livewire\Kitchen\Orders;
use App\Http\Livewire\Waitress\WaitressMenu;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('auth.login');
});


/** Authenticated Routes */
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/admin/menu-category', MenuCategory::class)->name('admin.menu-category');
    Route::get('/admin/menu', Menu::class)->name('admin.menu');
    Route::get('/admin/account', Account::class)->name('admin.account');
    Route::get('/admin/inventory', Inventory::class)->name('inventory');
    Route::get('/admin/sales-today', SaleToday::class)->name('sales-today');

    Route::get('/w/menu', WaitressMenu::class)->name('waitress.menu');
    Route::get('/k/orders', Orders::class)->name('kitchen.orders');
});
