<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate(Producto::$rules);
        //crear nuevo producto
        $producto = new Producto();
        //se recoge la imagen insertada
        $file = $request->file('imagen');
        // Obtener el nombre original del archivo
        $name = $file->getClientOriginalName();
        // se guarda en la carpeta pública imagenes para que se pueda utilizar siempre
        $file->move(public_path('imagenes'), $name);

        // insertamos los datos del producto
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->imagen = $name;
        $producto->detalles = $request->input('detalles');
        //guardamos el producto
        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
    
        return view('producto.edit', compact('producto'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
{
    request()->validate(Producto::$rules);

    $data = $request->all();

    // Verificar si se ha enviado una nueva imagen
    if ($request->hasFile('imagen')) {
        // Obtener el nombre original del archivo
        $nombreImagen = $request->file('imagen')->getClientOriginalName();

        // Asignar el nombre original al campo de la imagen en los datos a actualizar
        $data['imagen'] = $nombreImagen;

        // se mueve la imagen cargada a la ubicación de las imagenes
        $request->file('imagen')->move(public_path('imagenes'), $nombreImagen);
    }
     //se actualiza
    $producto->update($data);

    return redirect()->route('productos.index')
        ->with('success', 'Producto actualizado correctamente');
}


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
