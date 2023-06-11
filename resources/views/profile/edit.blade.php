@extends('layouts.app')

@section('template_title')
    Bienvenido
@endsection

@section('content')
<style>
    .user-profile-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .user-profile {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #0b9f55;
        padding: 20px;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
    }

    .user-profile h1 {
        text-align: center;
        font-size: 2rem;
        color: black;
        font-family: 'Times New Roman';
        margin-bottom: 20px;
    }

    .user-profile ul {
        list-style-type: none;
        padding: 0;
        text-align: center;
    }

    .user-profile ul li {
        margin-bottom: 10px;
    }

    .user-profile .btn-group {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .user-profile .btn-group .btn {
        margin-bottom: 5px;
        background-color: red;
        color: white;
        border-radius: 4px;
        padding: 8px 16px;
        margin-right: 5px;
    }
</style>

<script>
    function confirmDelete(){
        var respuesta = confirm("¿Estas seguro de eliminar el ususario?")
        if(respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>

<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="user-profile-container">
                <div class="user-profile">
                    @role('admin')
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Usuario Administrador
                    </h1>
                    @endrole
                    @role('user')
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Mis datos
                    </h1>
                    @endrole

                    <div class="max-w-xl">
                        <ul>
                            <li><strong>Nombre:</strong> {{ auth()->user()->name }}</li>
                            <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
                        </ul>
                    </div>

                    <div class="btn-group">
                    <a href="{{ route('EditarUsuarios', ['id' => auth()->user()->id]) }}" class="btn btn-primary">Editar datos</a>
                        <form action="{{ route('profile.destroyUser', ['id' => auth()->user()->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>





@endsection


