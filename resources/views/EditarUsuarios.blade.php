@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 500px;
        margin: 40px auto;
        padding: 20px;
        background-color: #0b9f55;
        align-items:center;
        border-radius: 4px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #ffffff;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #ffffff;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    button[type="submit"] {
        padding: 10px;
        font-size: 16px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        background-color: #ffffff;
        color: #000000;
        width: 100px;
    }
</style>

<div class="container">
    <h1>Editar Usuario</h1>

    <form action="{{ route('profile.update', $EditarUsuarios->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <!-- Campo oculto para la ID del usuario autenticado -->
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="{{ $EditarUsuarios->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $EditarUsuarios->email }}">
        </div>

        <button type="submit">Guardar</button>
    </form>
</div>



@endsection
