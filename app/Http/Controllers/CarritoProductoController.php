<?php

namespace App\Http\Controllers;

use App\CarritoProducto;
use App\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Class CarritoProductoController
 * @package App\Http\Controllers
 */
class CarritoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id(); // Obtiene el ID del usuario autenticado
        $carrito = Carrito::where('usuario_id', $userId)->first(); // Obtiene el carrito asociado al usuario
    
        $carritoProductos = CarritoProducto::where('carrito_id', $carrito->id)
                ->with('producto') // Carga la relación 'producto'
                ->paginate();
    
            return view('carrito-producto.index', compact('carritoProductos'))
                ->with('i', (request()->input('page', 1) - 1) * $carritoProductos->perPage());
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carritoProducto = new CarritoProducto();
        return view('carrito-producto.create', compact('carritoProducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CarritoProducto::$rules);

        $carritoProducto = CarritoProducto::create($request->all());

        return redirect()->route('Inicio')
            ->with('success', 'CarritoProducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carritoProducto = CarritoProducto::find($id);

        return view('carrito-producto.show', compact('carritoProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carritoProducto = CarritoProducto::find($id);

        return view('carrito-producto.edit', compact('carritoProducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CarritoProducto $carritoProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarritoProducto $carritoProducto)
    {
        request()->validate(CarritoProducto::$rules);

        $carritoProducto->update($request->all());

        return redirect()->route('carrito-productos.index')
            ->with('success', 'CarritoProducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carritoProducto = CarritoProducto::find($id)->delete();

        return redirect()->route('carrito-productos.index')
            ->with('success', 'CarritoProducto deleted successfully');
    }
}
