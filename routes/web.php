<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.layout');
});

Route::get('/menu', [PlatController::class, 'index'])->name('menu');

// add plats to cart
Route::post('/cart/add', [PlatController::class, 'invoice'])->name('add.cart');
// show the cart
Route::get('/cart', [PlatController::class, 'show'])->name('show.cart');
// destroy all cart plats
Route::get('/cart/destroy', [PlatController::class, 'destroy'])->name('destroy.all');
// update qty of giving plats 
Route::post('/cart/update/{id}', [PlatController::class, 'update'])->name('update.qty');
// store the order in db 
Route::get('/cart/store', [PlatController::class, 'store'])->name('store.order');