@extends('layouts.app')

@section('template_title')
    Bienvenido
@endsection

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis datos</title>
    <style>
        header {
            text-align: center;
            background-color: black;
            color: white;
            margin: 20px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
    @role('admin')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Usuario Administrador
        </h2>
        @endrole
        @role('user')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Mis datos
        </h2>
        @endrole
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- User Profile Information -->
                    <h3>Datos del usuario autentificado</h3>
                    <!-- Display user information here -->
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- Edit Profile Button -->
                    <a href="{{ route('EditarUsuarios', ['Id' => auth()->user()->id]) }}" class="btn btn-primary">Editar datos</a>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- Delete User Button -->
                    <form action="{{ route('profile.destroyUser',  ['id' => auth()->user()->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                            </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection


