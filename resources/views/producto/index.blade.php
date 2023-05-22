@extends('layouts.app')

@section('template_title')
    Productos
@endsection

@section('content')
<style>
 .table-container {
        padding-left: 100px;
        padding-right: 100px;
        max-width: 2000px;
        margin: 0 auto;
        
    }

    .table-container .table {
        background-color: #00cc66;
        border: 1px solid black;
        margin-top: 50px;
        width: 100%;
        table-layout: fixed;
    }

    .table-container .table td {
        text-align: center;
        padding: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        
    }

    .table-container .table th:first-child,
    .table-container .table td:first-child {
        width: 10%;
    }

    .table-container .table th:nth-child(2),
    .table-container .table td:nth-child(2) {
        width: 20%;
    }

    .table-container .table th:nth-child(3),
    .table-container .table td:nth-child(3) {
        width: 20%;
    }

    .table-container .table th:nth-child(4),
    .table-container .table td:nth-child(4) {
        width: 15%;
    }

    .table-container .table th:nth-child(5),
    .table-container .table td:nth-child(5) {
        width: 40%;
    }

    .table-container .table th:last-child,
    .table-container .table td:last-child {
        width: 10%;
        white-space: nowrap; /* Asegura que el contenido no se envuelva */
    }

    .add-product-button {
        margin: 20px;
        text-align: center; 
    }
    
    .add-product-button button {
        background-color: rgb(69, 212, 44);
        border: 2px solid black;
        margin: 10px;
    }
    
    .btn-primary {
        background-color: rgb(132, 216, 132);
        border: 2px solid black;
        margin: 10px;
        padding: 10px;
    }
    
    .btn-success {
        background-color: rgb(229, 172, 15);
        border: 2px solid black;
        margin: 10px;
        padding: 10px;
    }
    
    .btn-danger {
        background-color: rgb(235, 26, 26);
        border: 2px solid black;
        margin: 10px;
        padding: 10px;
    }

    h1 {
        text-align: center;
        font-size: 32px;
        color: black;
    }

    /* Agrega un margen negro debajo de cada línea de la tabla */
    .table-container .table tbody tr {
        border-bottom: 2px solid black;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="table-container">
                    <h1 style="color: rgb(0, 0, 0); font-size: 4rem; font-family: 'Times New Roman', serif;">Productos</h1>  
                    @if(count($productos) > 0)
                    <div class="add-product-button">
                        <a href="{{ route('productos.create') }}" class="btn btn-primary">Agregar producto</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr style="border-bottom: 2px solid black">
                                <th>Ref.</th>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Precio</th>
                                <th>Detalles</th>
                                <th style="width: 50%;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->imagen }}</td>
                                    <td>{{ $producto->precio }}€</td>
                                    <td>{{ $producto->detalles }}</td>
                                    <td>
                                        <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary" href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="add-product-button">
                        <a href="{{ route('productos.create') }}" class="btn btn-primary">Agregar producto</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
@endsection