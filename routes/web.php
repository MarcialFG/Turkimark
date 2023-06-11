<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarritoController;
use App\Producto;
use App\PedidoProducto;
use App\Models\User;
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

//Rutas para vistas sin controlador
Route::get('/', function () {
    return view('welcome');
});

Route::get('/Usuarios', function () {
    $users= User::all();
    return view('Usuarios')->with('users', $users);
})->middleware(['auth', 'verified'])->name('Usuarios');

Route::get('/Inicio', function () {
    $productos = Producto::all();
    return view('Inicio')->with('productos', $productos);
})->middleware(['auth', 'verified'])->name('Inicio');

Route::get('/ProductosPedidos/{Id}', function ($id) {
    $pedidoProductos = PedidoProducto::where('pedido_id', $id)->paginate();
    return view('ProductosPedidos')->with('pedidoProductos', $pedidoProductos);
})->middleware(['auth', 'verified'])->name('ProductosPedidos');

Route::get('/EditarUsuarios/{id}', function ($id) {
    $EditarUsuarios = User::where('id', $id)->first();
    return view('EditarUsuarios')->with('EditarUsuarios', $EditarUsuarios);
})->middleware(['auth', 'verified'])->name('EditarUsuarios');

//Rutas para vistas con controlador
Route::resource('carritos', App\Http\Controllers\CarritoController::class);

Route::resource('pedidos', App\Http\Controllers\PedidoController::class);

Route::resource('productos', App\Http\Controllers\ProductoController::class);

Route::resource('pedido-producto', App\Http\Controllers\PedidoProductoController::class);

Route::resource('carrito-productos', App\Http\Controllers\CarritoProductoController::class);

//Ruta específica para utilizar el método "destroyUser"
Route::delete('/profile/{id}', [ProfileController::class, 'destroyUser'])->name('profile.destroyUser');

//Rutas para el perfil del ususario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['put', 'patch'], '/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

//Ruta para la pantalla inicial
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



