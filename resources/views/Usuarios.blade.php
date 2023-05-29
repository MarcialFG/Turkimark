@extends('layouts.app')

@section('template_title')
    Usuarios
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
        background-color: #238b57;
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
                    <h1 style="color: rgb(0, 0, 0); font-size: 4rem; font-family: 'Times New Roman', serif;">Usuarios</h1>  
                    <table class="table">
                        <thead>
                            <tr style="border-bottom: 2px solid black">
                                <th>Ref.</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Creación</th>
                                <th style="width: 50%;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $users)
                                @if ($users->id !== Auth::id())
                                    <tr>
                                        <td>{{ $users->id }}</td>
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>{{ $users->created_at }}</td>
                                        <td>
                                            <form action="{{ route('profile.destroyUser', $users->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection