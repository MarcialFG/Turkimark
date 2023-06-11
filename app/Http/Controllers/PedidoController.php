<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CarritoProducto;
use App\Carrito;
use App\PedidoProducto;;

/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
    
        if ($user->hasRole('admin')) { //si el usuario autentificado tiene el rol "admin" asociado
            $pedidos = Pedido::all();   //recoge todos los pedidos
        } else { //si el usuario autentificado tiene un rol diferente
            $pedidos = Pedido::where('usuario_id', $user->id)->get(); //recoge los pedidos que tengan su id asociado
        }
    
        return view('pedido.index', compact('pedidos'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedido = new Pedido();
        return view('pedido.create', compact('pedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
        request()->validate(Pedido::$rules);
    
    // Crear el pedido
    $pedido = Pedido::create($request->all());

    // Obtener el usuario autenticado
    $usuario_id = Auth::user()->id;

    // Obtener el carrito del usuario autenticado
    $carrito = Carrito::where('usuario_id', $usuario_id)->first();

    if ($carrito) {
        // Obtener los productos del carrito
        $productosCarrito = CarritoProducto::where('carrito_id', $carrito->id)->get();

        // Guardar los productos del carrito en la tabla "pedido_productos"
        foreach ($productosCarrito as $producto) {
            PedidoProducto::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $producto->producto_id,
                'precio' => $producto->precio,
                'cantidad' => 1,
            ]);
        }

        // Borrar los productos del carrito
        $productosCarrito->each(function ($producto) {
            $producto->delete();
        });
    }

    return redirect()->route('pedidos.index')
        ->with('success', 'Pedido creado exitosamente.');
}


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);

        return view('pedido.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);

        return view('pedido.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        request()->validate(Pedido::$rules);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id)->delete();

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido deleted successfully');
    }
}
