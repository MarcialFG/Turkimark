<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarritoController;
use App\Producto;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/Inicio', function () {
    $productos = Producto::all();
    return view('Inicio')->with('productos', $productos);
})->middleware(['auth', 'verified'])->name('Inicio');


Route::resource('carritos', App\Http\Controllers\CarritoController::class);

Route::resource('pedidos', App\Http\Controllers\PedidoController::class);

Route::resource('productos', App\Http\Controllers\ProductoController::class);

Route::resource('pedido-producto', App\Http\Controllers\PedidoProductoController::class);

Route::resource('carrito-productos', App\Http\Controllers\CarritoProductoController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



